<?php

/**
 * This is the model class for table "participants".
 *
 * The followings are the available columns in table 'participants':
 * @property integer $id
 * @property integer $group_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $contact_number
 * @property integer $include
 *
 * The followings are the available model relations:
 * @property Groups $group
 * @property Winners[] $winners
 */
class Participants extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'participants';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, first_name, middle_name, last_name, birthdate, contact_number', 'required'),
			array('id, group_id, include', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>255),
			array('contact_number', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, group_id, first_name, middle_name, last_name, birthdate, contact_number, include', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
			'winners' => array(self::HAS_MANY, 'Winners', 'participant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'birthdate' => 'Birthdate',
			'contact_number' => 'Contact Number',
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
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('include',$this->include);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Participants the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getName($id)
	{
		$name = $this->findByPk($id);
		return "{$name->first_name} {$name->middle_name} {$name->last_name}";
	}

	public function getConcatened(){
    		return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
	}

}
