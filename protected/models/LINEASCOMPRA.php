<?php

/**
 * This is the model class for table "LINEASCOMPRA".
 *
 * The followings are the available columns in table 'LINEASCOMPRA':
 * @property integer $id
 * @property integer $idArticulo
 * @property integer $Cantidad
 * @property integer $idFactura
 * @property string $NombreDelProducto
 * @property double $CosteOrigenProducto
 * @property integer $isBlank
 *
 * The followings are the available model relations:
 * @property FACTURAS $idFactura0
 * @property ARTICULOS $idArticulo0
 */
class LINEASCOMPRA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LINEASCOMPRA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idArticulo, Cantidad, idFactura, NombreDelProducto, CosteOrigenProducto, isBlank', 'required'),
			array('idArticulo, Cantidad, idFactura, isBlank', 'numerical', 'integerOnly'=>true),
			array('CosteOrigenProducto', 'numerical'),
			array('NombreDelProducto', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idArticulo, Cantidad, idFactura, NombreDelProducto, CosteOrigenProducto, isBlank', 'safe', 'on'=>'search'),
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
			'idFactura0' => array(self::BELONGS_TO, 'FACTURAS', 'idFactura'),
			'idArticulo0' => array(self::BELONGS_TO, 'ARTICULOS', 'idArticulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idArticulo' => 'Id Articulo',
			'Cantidad' => 'Cantidad',
			'idFactura' => 'Id Factura',
			'NombreDelProducto' => 'Nombre Del Producto',
			'CosteOrigenProducto' => 'Coste Origen Producto',
			'isBlank' => 'Is Blank',
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
		$criteria->compare('idArticulo',$this->idArticulo);
		$criteria->compare('Cantidad',$this->Cantidad);
		$criteria->compare('idFactura',$this->idFactura);
		$criteria->compare('NombreDelProducto',$this->NombreDelProducto,true);
		$criteria->compare('CosteOrigenProducto',$this->CosteOrigenProducto);
		$criteria->compare('isBlank',$this->isBlank);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LINEASCOMPRA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
