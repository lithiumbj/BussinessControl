<?php

/**
 * This is the model class for table "EMPLEADOS".
 *
 * The followings are the available columns in table 'EMPLEADOS':
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $FechaNacimiento
 * @property string $DNI
 * @property string $Direccion
 * @property string $Poblacion
 * @property string $Ciudad
 * @property string $Pais
 * @property string $Email
 * @property string $Password
 * @property string $CuentaBancaria
 * @property string $SeguridadSocial
 *
 * The followings are the available model relations:
 * @property ALBARANES[] $aLBARANESs
 * @property FACTURAS[] $fACTURASes
 * @property PRESUPUESTOS[] $pRESUPUESTOSes
 */
class EMPLEADOS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EMPLEADOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DNI', 'required'),
			array('Nombre, Apellidos, Password', 'length', 'max'=>100),
			array('DNI', 'length', 'max'=>9),
			array('Direccion', 'length', 'max'=>256),
			array('Poblacion, Ciudad, Pais, CuentaBancaria, SeguridadSocial', 'length', 'max'=>45),
			array('Email', 'length', 'max'=>128),
			array('FechaNacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, Apellidos, FechaNacimiento, DNI, Direccion, Poblacion, Ciudad, Pais, Email, Password, CuentaBancaria, SeguridadSocial', 'safe', 'on'=>'search'),
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
			'aLBARANESs' => array(self::HAS_MANY, 'ALBARANES', 'idEmpleado'),
			'fACTURASes' => array(self::HAS_MANY, 'FACTURAS', 'idEmpleado'),
			'pRESUPUESTOSes' => array(self::HAS_MANY, 'PRESUPUESTOS', 'idEmpleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Nombre' => 'Nombre',
			'Apellidos' => 'Apellidos',
			'FechaNacimiento' => 'Fecha Nacimiento',
			'DNI' => 'Dni',
			'Direccion' => 'Direccion',
			'Poblacion' => 'Poblacion',
			'Ciudad' => 'Ciudad',
			'Pais' => 'Pais',
			'Email' => 'Email',
			'Password' => 'Password',
			'CuentaBancaria' => 'Cuenta Bancaria',
			'SeguridadSocial' => 'Seguridad Social',
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
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellidos',$this->Apellidos,true);
		$criteria->compare('FechaNacimiento',$this->FechaNacimiento,true);
		$criteria->compare('DNI',$this->DNI,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Poblacion',$this->Poblacion,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Pais',$this->Pais,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('CuentaBancaria',$this->CuentaBancaria,true);
		$criteria->compare('SeguridadSocial',$this->SeguridadSocial,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EMPLEADOS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
