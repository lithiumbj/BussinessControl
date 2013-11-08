<?php

/**
 * This is the model class for table "ARTICULOPROVEEDOR".
 *
 * The followings are the available columns in table 'ARTICULOPROVEEDOR':
 * @property integer $id
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Dx
 * @property string $Dy
 * @property string $Dz
 * @property string $CosteUnitario
 * @property string $Descuento
 * @property string $CantidadMinima
 * @property integer $idProveedor
 *
 * The followings are the available model relations:
 * @property PROVEEDORES $idProveedor0
 * @property ARTICULOS[] $aRTICULOSes
 * @property LINEASALBARAN[] $lINEASALBARANs
 */
class ARTICULOPROVEEDOR extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ARTICULOPROVEEDOR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProveedor', 'required'),
			array('idProveedor', 'numerical', 'integerOnly'=>true),
			array('Nombre, Descripcion, Dx, Dy, Dz, CosteUnitario, Descuento, CantidadMinima', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, Descripcion, Dx, Dy, Dz, CosteUnitario, Descuento, CantidadMinima, idProveedor', 'safe', 'on'=>'search'),
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
			'idProveedor0' => array(self::BELONGS_TO, 'PROVEEDORES', 'idProveedor'),
			'aRTICULOSes' => array(self::HAS_MANY, 'ARTICULOS', 'idArtProveedor'),
			'lINEASALBARANs' => array(self::HAS_MANY, 'LINEASALBARAN', 'idArticulo'),
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
			'Descripcion' => 'Descripcion',
			'Dx' => 'Dx',
			'Dy' => 'Dy',
			'Dz' => 'Dz',
			'CosteUnitario' => 'Coste Unitario',
			'Descuento' => 'Descuento',
			'CantidadMinima' => 'Cantidad Minima',
			'idProveedor' => 'Id Proveedor',
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
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Dx',$this->Dx,true);
		$criteria->compare('Dy',$this->Dy,true);
		$criteria->compare('Dz',$this->Dz,true);
		$criteria->compare('CosteUnitario',$this->CosteUnitario,true);
		$criteria->compare('Descuento',$this->Descuento,true);
		$criteria->compare('CantidadMinima',$this->CantidadMinima,true);
		$criteria->compare('idProveedor',$this->idProveedor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ARTICULOPROVEEDOR the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
