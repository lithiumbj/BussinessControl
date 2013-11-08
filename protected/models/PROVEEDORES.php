<?php

/**
 * This is the model class for table "PROVEEDORES".
 *
 * The followings are the available columns in table 'PROVEEDORES':
 * @property integer $id
 * @property string $Nombre
 * @property string $CIFEmpresa
 * @property string $Telefono
 * @property string $Direccion
 * @property string $CodigoPostal
 * @property string $Poblacion
 * @property string $Ciudad
 * @property string $Pais
 * @property string $Email
 * @property string $PersonaDeContacto
 *
 * The followings are the available model relations:
 * @property ARTICULOPROVEEDOR[] $aRTICULOPROVEEDORs
 */
class PROVEEDORES extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PROVEEDORES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CIFEmpresa', 'required'),
			array('Nombre, CIFEmpresa, Telefono, Direccion, CodigoPostal, Poblacion, Ciudad, Pais, Email, PersonaDeContacto', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, CIFEmpresa, Telefono, Direccion, CodigoPostal, Poblacion, Ciudad, Pais, Email, PersonaDeContacto', 'safe', 'on'=>'search'),
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
			'aRTICULOPROVEEDORs' => array(self::HAS_MANY, 'ARTICULOPROVEEDOR', 'idProveedor'),
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
			'CIFEmpresa' => 'Cifempresa',
			'Telefono' => 'Telefono',
			'Direccion' => 'Direccion',
			'CodigoPostal' => 'Codigo Postal',
			'Poblacion' => 'Poblacion',
			'Ciudad' => 'Ciudad',
			'Pais' => 'Pais',
			'Email' => 'Email',
			'PersonaDeContacto' => 'Persona De Contacto',
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
		$criteria->compare('CIFEmpresa',$this->CIFEmpresa,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CodigoPostal',$this->CodigoPostal,true);
		$criteria->compare('Poblacion',$this->Poblacion,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Pais',$this->Pais,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('PersonaDeContacto',$this->PersonaDeContacto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PROVEEDORES the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
