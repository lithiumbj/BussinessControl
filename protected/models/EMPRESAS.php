<?php

/**
 * This is the model class for table "EMPRESAS".
 *
 * The followings are the available columns in table 'EMPRESAS':
 * @property integer $id
 * @property string $CIFEmpresa
 * @property string $Nombre
 * @property string $Direccion
 * @property string $CodigoPostal
 * @property string $Poblacion
 * @property string $Ciudad
 * @property string $Descripcion
 *
 * The followings are the available model relations:
 * @property CLIENTES[] $cLIENTESs
 */
class EMPRESAS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EMPRESAS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CIFEmpresa, Nombre, Direccion, CodigoPostal, Poblacion, Ciudad, Descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, CIFEmpresa, Nombre, Direccion, CodigoPostal, Poblacion, Ciudad, Descripcion', 'safe', 'on'=>'search'),
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
			'cLIENTESs' => array(self::HAS_MANY, 'CLIENTES', 'Empresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'CIFEmpresa' => 'Cifempresa',
			'Nombre' => 'Nombre',
			'Direccion' => 'Direccion',
			'CodigoPostal' => 'Codigo Postal',
			'Poblacion' => 'Poblacion',
			'Ciudad' => 'Ciudad',
			'Descripcion' => 'Descripcion',
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
		$criteria->compare('CIFEmpresa',$this->CIFEmpresa,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CodigoPostal',$this->CodigoPostal,true);
		$criteria->compare('Poblacion',$this->Poblacion,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EMPRESAS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
