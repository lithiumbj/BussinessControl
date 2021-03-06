<?php

/**
 * This is the model class for table "ALBARANES".
 *
 * The followings are the available columns in table 'ALBARANES':
 * @property integer $id
 * @property integer $idProveedor
 * @property string $Observaciones
 * @property integer $idEmpleado
 *
 * The followings are the available model relations:
 * @property EMPLEADOS $idEmpleado0
 * @property PROVEEDORES $idProveedor0
 * @property LINEASALBARAN[] $lINEASALBARANs
 */
class ALBARANES extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ALBARANES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor, idEmpleado', 'required'),
			array('idProveedor, idEmpleado', 'numerical', 'integerOnly'=>true),
			array('Observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idProveedor, Observaciones, idEmpleado', 'safe', 'on'=>'search'),
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
			'idEmpleado0' => array(self::BELONGS_TO, 'EMPLEADOS', 'idEmpleado'),
			'idProveedor0' => array(self::BELONGS_TO, 'PROVEEDORES', 'idProveedor'),
			'lINEASALBARANs' => array(self::HAS_MANY, 'LINEASALBARAN', 'idAlbaran'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idProveedor' => 'Id Proveedor',
			'Observaciones' => 'Observaciones',
			'idEmpleado' => 'Id Empleado',
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
		$criteria->compare('idProveedor',$this->idProveedor);
		$criteria->compare('Observaciones',$this->Observaciones,true);
		$criteria->compare('idEmpleado',$this->idEmpleado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ALBARANES the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
