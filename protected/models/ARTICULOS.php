<?php

/**
 * This is the model class for table "ARTICULOS".
 *
 * The followings are the available columns in table 'ARTICULOS':
 * @property integer $id
 * @property string $Nombre
 * @property integer $Stock
 * @property string $Dx
 * @property string $Dy
 * @property string $Dz
 * @property string $Peso
 * @property integer $idArtProveedor
 * @property string $Descripcion
 * @property double $pvp
 *
 * The followings are the available model relations:
 * @property ARTICULOPROVEEDOR $idArtProveedor0
 * @property LINEASCOMPRA[] $lINEASCOMPRAs
 * @property LINEASPRESUPUESTOS[] $lINEASPRESUPUESTOSes
 */
class ARTICULOS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ARTICULOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Stock, idArtProveedor, pvp', 'required'),
			array('Stock, idArtProveedor', 'numerical', 'integerOnly'=>true),
			array('pvp', 'numerical'),
			array('Nombre, Dx, Dy, Dz, Peso, Descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Nombre, Stock, Dx, Dy, Dz, Peso, idArtProveedor, Descripcion, pvp', 'safe', 'on'=>'search'),
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
			'idArtProveedor0' => array(self::BELONGS_TO, 'ARTICULOPROVEEDOR', 'idArtProveedor'),
			'lINEASCOMPRAs' => array(self::HAS_MANY, 'LINEASCOMPRA', 'idArticulo'),
			'lINEASPRESUPUESTOSes' => array(self::HAS_MANY, 'LINEASPRESUPUESTOS', 'idArticulo'),
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
			'Stock' => 'Stock',
			'Dx' => 'Dx',
			'Dy' => 'Dy',
			'Dz' => 'Dz',
			'Peso' => 'Peso',
			'idArtProveedor' => 'Id Art Proveedor',
			'Descripcion' => 'Descripcion',
			'pvp' => 'Pvp',
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
		$criteria->compare('Stock',$this->Stock);
		$criteria->compare('Dx',$this->Dx,true);
		$criteria->compare('Dy',$this->Dy,true);
		$criteria->compare('Dz',$this->Dz,true);
		$criteria->compare('Peso',$this->Peso,true);
		$criteria->compare('idArtProveedor',$this->idArtProveedor);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('pvp',$this->pvp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ARTICULOS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
