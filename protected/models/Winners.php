<?php

/**
 * This is the model class for table "winners".
 *
 * The followings are the available columns in table 'winners':
 * @property integer $id
 * @property integer $raffle_id
 * @property integer $event_id
 * @property integer $participant_id
 * @property integer $group_id
 * @property string $datetime
 *
 * The followings are the available model relations:
 * @property Raffles $raffle
 * @property Events $event
 * @property Participants $participant
 * @property Groups $group
 */
class Winners extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'winners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('raffle_id, event_id, participant_id, group_id', 'required'),
			array('id, raffle_id, event_id, participant_id, group_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, raffle_id, event_id, participant_id, group_id, datetime', 'safe', 'on'=>'search'),
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
			'raffle' => array(self::BELONGS_TO, 'Raffles', 'raffle_id'),
			'event' => array(self::BELONGS_TO, 'Events', 'event_id'),
			'participant' => array(self::BELONGS_TO, 'Participants', 'participant_id'),
			'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'raffle_id' => 'Raffle',
			'event_id' => 'Event',
			'participant_id' => 'Participant',
			'group_id' => 'Group',
			'datetime' => 'Date/Time',
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
		$criteria->compare('raffle_id',$this->raffle_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('participant_id',$this->participant_id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('datetime',$this->datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Winners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
