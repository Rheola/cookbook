<?php

class Application_Model_SectionMapper
{


    /**
     * @var Application_Model_Section
     */
    protected $_dbTable;

    /**
     * @param $dbTable
     * @return Application_Model_SectionMapper
     * @throws Exception
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }

        if (!$dbTable instanceof Zend_Db_Table_Abstract) {

            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;

        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_Section');
        }

        return $this->_dbTable;

    }

    public function save(Application_Model_Section $section)
    {
        $data = [
            'name' => $section->name,
        ];

        if (null === ($id = $section->id)) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, ['id = ?' => $id]);
        }
    }

    public function find($id, Application_Model_Section $section)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $section->id = $row->id;
        $section->name = $row->name;
    }

    public function fetchAll()
    {
        $table = $this->getDbTable();

        $resultSet = $table->fetchAll();

        $entries = [];
        foreach ($resultSet as $row) {

            $entry = new Application_Model_Section();
            $entry->id = $row->id;
            $entry->name = $row->name;

            $entries[] = $entry;
        }
        return $entries;
    }
}

