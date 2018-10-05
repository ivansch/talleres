<?php
 class Model
{
  public $table;
  public $columns;
  public $datos;
  protected $db,

  public function __construct($datos=[])
  {
    $this->datos = $datos;
    $this->db = new MySQL_DB();
  }

  public function save()
  {
    if (!$this->getAttr('id')) {
      $this->insert();
    } else {
      $this->update();
    }
  }

  private function insert()
  {
   $this->db->insert($this->datos,$this);
  }

  private function getAttr($attr)
  {
    return insset($this->datos[$attr]) ? $this->datos[$attr] : null;
  }
  public function setAttr($attr, $value)
  {
      $this->datos[$attr] = $value;
  }
}
