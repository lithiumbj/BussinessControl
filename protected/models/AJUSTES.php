<?php

/**
 * This is the model class for table "AJUSTES".
 *
 * The followings are the available columns in table 'AJUSTES':
 * @property double $IVA
 * @property double $RecargoEquivalencia
 * @property string $CIFEmpresa
 * @property string $NombreEmpresa
 * @property string $NombreCEO
 * @property string $ApellidosCEO
 * @property string $DireccionEmpresa
 * @property string $PoblacionEmpresa
 * @property string $CiudadEmpresa
 * @property string $CPEmpresa
 */
class AJUSTES extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AJUSTES';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IVA, RecargoEquivalencia, CIFEmpresa, NombreEmpresa, NombreCEO, ApellidosCEO, DireccionEmpresa, PoblacionEmpresa, CiudadEmpresa, CPEmpresa', 'required'),
			array('IVA, RecargoEquivalencia', 'numerical'),
			array('CIFEmpresa, NombreEmpresa, NombreCEO, ApellidosCEO, DireccionEmpresa, PoblacionEmpresa, CiudadEmpresa, CPEmpresa', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IVA, RecargoEquivalencia, CIFEmpresa, NombreEmpresa, NombreCEO, ApellidosCEO, DireccionEmpresa, PoblacionEmpresa, CiudadEmpresa, CPEmpresa', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IVA' => 'Iva',
			'RecargoEquivalencia' => 'Recargo Equivalencia',
			'CIFEmpresa' => 'Cifempresa',
			'NombreEmpresa' => 'Nombre Empresa',
			'NombreCEO' => 'Nombre Ceo',
			'ApellidosCEO' => 'Apellidos Ceo',
			'DireccionEmpresa' => 'Direccion Empresa',
			'PoblacionEmpresa' => 'Poblacion Empresa',
			'CiudadEmpresa' => 'Ciudad Empresa',
			'CPEmpresa' => 'Cpempresa',
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

		$criteria->compare('IVA',$this->IVA);
		$criteria->compare('RecargoEquivalencia',$this->RecargoEquivalencia);
		$criteria->compare('CIFEmpresa',$this->CIFEmpresa,true);
		$criteria->compare('NombreEmpresa',$this->NombreEmpresa,true);
		$criteria->compare('NombreCEO',$this->NombreCEO,true);
		$criteria->compare('ApellidosCEO',$this->ApellidosCEO,true);
		$criteria->compare('DireccionEmpresa',$this->DireccionEmpresa,true);
		$criteria->compare('PoblacionEmpresa',$this->PoblacionEmpresa,true);
		$criteria->compare('CiudadEmpresa',$this->CiudadEmpresa,true);
		$criteria->compare('CPEmpresa',$this->CPEmpresa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AJUSTES the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
