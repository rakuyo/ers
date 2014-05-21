<?php

/**
 * This is the model class for table "groups".
 *
 * The followings are the available columns in table 'groups':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $include
 *
 * The followings are the available model relations:
 * @property Participants[] $participants
 * @property Winners[] $winners
 */
class Groups extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('id, include', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, include', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'participants' => array(self::HAS_MANY, 'Participants', 'group_id'),
			'winners' => array(self::HAS_MANY, 'Winners', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'include' => 'Include',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('include',$this->include);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function behaviors() {
 	  return array(
            'import' => array(
              'class' => 'ext.import.behaviors.ImportBehavior',
              //name of model
              'model'=>'Groups',
              //name of the controller
              'controller'=>'groups',
              'fields'=>array(
                'name'=>array('displayName'=>'Group Name', 'sample'=>'systems'),
                'description'=>array('displayName'=>'Description', 'sample'=>'dota team'),
              ),
              //url that the user is returned to after successful import
              'returnUrl'=> '/groups/admin',
              //the "title" field of the model
              'titleField'=> 'Groups',
              //do you want the user to see the data in form view
              'showImportForm'=> false,
              //only used if "showImportForm" is set to true
              //the view that must exist in the model's view folder
              'importView'=>'show_import_stores_ext'
            ),
          );
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Groups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
