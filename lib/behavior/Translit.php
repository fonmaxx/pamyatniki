<?php
class Doctrine_Template_Translit extends Doctrine_Template
{

    protected $_options = array(
        'name'          =>  'translit',
        'alias'         =>  null,
        'type'          =>  'string',
        'length'        =>  255,
        'unique'        =>  true,
        'options'       =>  array(),
        'fields'        =>  array(),
        'uniqueBy'      =>  array(),
        'uniqueIndex'   =>  true,
        'canUpdate'     =>  true,
        'builder'       =>  array('Doctrine_Inflector', 'urlize'),
        'indexName'     =>  null
    );

    /**
     * Set table definition for Translit behavior
     *
     * @return void
     */
    public function setTableDefinition()
    {
        $name = $this->_options['name'];
        if ($this->_options['alias']) {
            $name .= ' as ' . $this->_options['alias'];
        }
        if ($this->_options['indexName'] === null) {
            $this->_options['indexName'] = $this->getTable()->getTableName().'_translit';
        }
        $this->hasColumn($name, $this->_options['type'], $this->_options['length'], $this->_options['options']);

        if ($this->_options['unique'] == true && $this->_options['uniqueIndex'] == true) {
            $indexFields = array($this->_options['name']);
            $indexFields = array_merge($indexFields, $this->_options['uniqueBy']);
            $this->index($this->_options['indexName'], array('fields' => $indexFields,
                                                             'type' => 'unique'));
        }

        $this->addListener(new Doctrine_Template_Listener_Translit($this->_options));
    }
}