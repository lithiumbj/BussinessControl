<?php

/**
 * This is the model class for table "PRESUPUESTOS".
 *
 * The followings are the available columns in table 'PRESUPUESTOS':
 * @property integer $ID
 * @property integer $idCliente
 * @property string $Fecha
 * @property string $Observaciones
 * @property integer $idEmpleado
 * @property integer $Proforma
 * @property string $Cabecera
 * @property string $Pie
 *
 * The followings are the available model relations:
 * @property LINEASPRESUPUESTOS[] $lINEASPRESUPUESTOSes
 * @property CLIENTES $idCliente0
 * @property EMPLEADOS $idEmpleado0
 */
class PRESUPUESTOS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PRESUPUESTOS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, idEmpleado', 'required'),
			array('idCliente, idEmpleado, Proforma', 'numerical', 'integerOnly'=>true),
			array('Fecha, Observaciones, Cabecera, Pie', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, idCliente, Fecha, Observaciones, idEmpleado, Proforma, Cabecera, Pie', 'safe', 'on'=>'search'),
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
			'lINEASPRESUPUESTOSes' => array(self::HAS_MANY, 'LINEASPRESUPUESTOS', 'idFactura'),
			'idCliente0' => array(self::BELONGS_TO, 'CLIENTES', 'idCliente'),
			'idEmpleado0' => array(self::BELONGS_TO, 'EMPLEADOS', 'idEmpleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'idCliente' => 'Id Cliente',
			'Fecha' => 'Fecha',
			'Observaciones' => 'Observaciones',
			'idEmpleado' => 'Id Empleado',
			'Proforma' => 'Proforma',
			'Cabecera' => 'Cabecera',
			'Pie' => 'Pie',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Observaciones',$this->Observaciones,true);
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('Proforma',$this->Proforma);
		$criteria->compare('Cabecera',$this->Cabecera,true);
		$criteria->compare('Pie',$this->Pie,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PRESUPUESTOS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
