<?php

/**
 * This is the model class for table "LINEASALBARAN".
 *
 * The followings are the available columns in table 'LINEASALBARAN':
 * @property integer $id
 * @property integer $Cantidad
 * @property integer $idArticulo
 * @property integer $idAlbaran
 *
 * The followings are the available model relations:
 * @property ALBARANES $idAlbaran0
 * @property ARTICULOPROVEEDOR $idArticulo0
 */
class LINEASALBARAN extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LINEASALBARAN';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cantidad, idArticulo, idAlbaran', 'required'),
			array('Cantidad, idArticulo, idAlbaran', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Cantidad, idArticulo, idAlbaran', 'safe', 'on'=>'search'),
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
			'idAlbaran0' => array(self::BELONGS_TO, 'ALBARANES', 'idAlbaran'),
			'idArticulo0' => array(self::BELONGS_TO, 'ARTICULOPROVEEDOR', 'idArticulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Cantidad' => 'Cantidad',
			'idArticulo' => 'Id Articulo',
			'idAlbaran' => 'Id Albaran',
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
		$criteria->compare('Cantidad',$this->Cantidad);
		$criteria->compare('idArticulo',$this->idArticulo);
		$criteria->compare('idAlbaran',$this->idAlbaran);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LINEASALBARAN the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
