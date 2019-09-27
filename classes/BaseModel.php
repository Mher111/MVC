<?php
    class BaseModel extends Database
    {

        public function action($action, $table, $where = array())
        {
            if (count($where) === 3) {
                $operators = array('=', '>', '<', '>=', '<=');
                $field = $where[0];
                $operator = $where[1];
                $value = $where[2];

                if (in_array($operator, $operators)) {
                    $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                    if (!$this->query($sql, array($value))->_error) {
                        return $this;
                    }
                }

            }
        }

        public function get($table, $where,$value)
        {
            return $this->action('SELECT *', $table, $where);
        }

        public function delete($table, $where)
        {
            return $this->action('DELETE', $table, $where);
        }

        public function error()
        {
            return $this->_error;
        }

        public function first()
        {
            return $this->result()[0];
        }

        public function result()
        {
            return $this->_results;
        }

        public function count()
        {
            return $this->_count;
        }

        public function insert($table, $fields = array())
        {
            if (count($fields)) {
                $keys = array_keys($fields);

                $values = '';
                $x = 1;
                foreach ($fields as $field) {
                    $values .= "?";
                    if ($x < count($fields)) {
                        $values .= ", ";

                    }
                    $x++;
                }
                $sql = "INSERT INTO users (`" . implode('`,`', $keys) . "`) VALUES ({$values})";


                if (!$this->query($sql, $fields)->error()) {
                    return true;
                }
            }
            return false;
        }

        public function update($table, $id, $fields)
        {
            $set = '';
            $x = 1;
            foreach ($fields as $name => $values) {
                $set .= "{$name}=?";
                if ($x < count($fields)) {
                    $set .= ", ";
                    print_r($values);
                }
                $x++;
            }
            $sql = "UPDATE {$table} SET {$set} WHERE id={$id}";
            if (!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
    }
