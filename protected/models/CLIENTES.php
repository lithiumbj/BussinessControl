<?php

/**
 * This is the model class for table "CLIENTES".
 *
 * The followings are the available columns in table 'CLIENTES':
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Direccion
 * @property string $CodigoPostal
 * @property string $Ciudad
 * @property string $Poblacion
 * @property string $Pais
 * @property string $Telefono1
 * @property string $Telefono2
 * @property string $NombreContacto
 * @property string $Email1
 * @property string $Email2
 * @property string $Empresa
 * @property string $CIFEmpresa
 * @property string $Condicion
 *
 * The followings are the available model relations:
 * @property FACTURAS[] $fACTURASes
 */
class CLIENTES extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CLIENTES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, Apellidos, Direccion, CodigoPostal, Ciudad, Poblacion, Pais, Telefono1, Telefono2, NombreContacto, Email1, Email2, Empresa, CIFEmpresa, Condicion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, Apellidos, Direccion, CodigoPostal, Ciudad, Poblacion, Pais, Telefono1, Telefono2, NombreContacto, Email1, Email2, Empresa, CIFEmpresa, Condicion', 'safe', 'on'=>'search'),
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
			'fACTURASes' => array(self::HAS_MANY, 'FACTURAS', 'idCliente'),
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
			'Direccion' => 'Direccion',
			'CodigoPostal' => 'Codigo Postal',
			'Ciudad' => 'Ciudad',
			'Poblacion' => 'Poblacion',
			'Pais' => 'Pais',
			'Telefono1' => 'Telefono1',
			'Telefono2' => 'Telefono2',
			'NombreContacto' => 'Nombre Contacto',
			'Email1' => 'Email1',
			'Email2' => 'Email2',
			'Empresa' => 'Empresa',
			'CIFEmpresa' => 'Cifempresa',
			'Condicion' => 'Condicion',
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
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CodigoPostal',$this->CodigoPostal,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Poblacion',$this->Poblacion,true);
		$criteria->compare('Pais',$this->Pais,true);
		$criteria->compare('Telefono1',$this->Telefono1,true);
		$criteria->compare('Telefono2',$this->Telefono2,true);
		$criteria->compare('NombreContacto',$this->NombreContacto,true);
		$criteria->compare('Email1',$this->Email1,true);
		$criteria->compare('Email2',$this->Email2,true);
		$criteria->compare('Empresa',$this->Empresa,true);
		$criteria->compare('CIFEmpresa',$this->CIFEmpresa,true);
		$criteria->compare('Condicion',$this->Condicion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CLIENTES the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
