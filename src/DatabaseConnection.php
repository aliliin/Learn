<?php

namespace Learn;

class Model
{
    //连接
    protected $link;
    //表
    protected $table;
    //用户
    protected $user;
    //主机
    protected $host;
    //密码
    protected $pwd;
    //表前缀
    protected $prefix;
    //库
    protected $dbName;
    //字符集
    protected $charset;
    //字段
    protected $fields;
    //sql语句
    protected $sql;
    //选项
    protected $options;

    //初化属性
    public function __construct($config = null)
    {
        if (is_null($config)) {
            $config = $GLOBALS['config'];
        }

        $this->host    = $config['DB_HOST'];
        $this->user    = $config['DB_USER'];
        $this->pwd     = $config['DB_PWD'];
        $this->dbName  = $config['DB_NAME'];
        $this->charset = $config['DB_CHARSET'];
        $this->prefix  = $config['DB_PREFIX'];
        $this->table   = $this->getTableName();
        $this->link    = $this->connect();
        if (!$this->link) {
            exit('数据库连接失败');
        }
        $this->fields = $this->getFields();
    }

    public function count($field = null)
    {
        if (empty($field)) {
            $field = $this->fields['_pk'];
        }
        $sql    = "select count($field) as t from " . $this->table;
        $result = $this->query($sql);
        return $result[0]['t'];
    }

    public function sum($field = null)
    {
        if (empty($field)) {
            $field = $this->fields['_pk'];
        }
        $sql    = "select sum($field) as ma from " . $this->table;
        $result = $this->query($sql);
        return $result[0]['ma'];
    }

    public function min($field = null)
    {
        if (empty($field)) {
            $field = $this->fields['_pk'];
        }
        $sql    = "select min($field) as ma from " . $this->table;
        $result = $this->query($sql);
        return $result[0]['ma'];
    }

    public function max($field = null)
    {
        if (empty($field)) {
            $field = $this->fields['_pk'];
        }
        $sql    = "select max($field) as ma from " . $this->table;
        $result = $this->query($sql);
        return $result[0]['ma'];
    }

    public function delete()
    {
        $sql = "DELETE FROM  %TABLE% %WHERE% %ORDER% %LIMIT%";
        $sql = str_replace(
            array('%TABLE%', '%WHERE%', '%ORDER%', '%LIMIT%'),
            array(
                $this->parseTable(),
                $this->parseWhere(),
                $this->parseOrder(),
                $this->parseLimit(),
            ),
            $sql
        );
        //echo $sql;
        $this->sql = $sql;
        return $this->exec($sql);

    }

    public function update($data)
    {
        $sql = "UPDATE %TABLE% %SET% %WHERE%";
        $sql = str_replace(
            array('%TABLE%', '%SET%', '%WHERE%'),
            array(
                $this->parseTable(),
                $this->parseSet($data),
                $this->parseWhere(),
            ),
            $sql
        );
        // echo $sql . '<br>';

        $this->sql = $sql;
        return $this->exec($sql);
    }

    protected function parseSet($data)
    {
        foreach ($data as $key => $val) {
            $val = $this->parseValue($val);
            if (is_scalar($val)) {
                $set[] = $key . '=' . $val;
            }

        }
        return ' SET ' . implode(',', $set);
    }

    public function add($data)
    {
        $sql = "insert into %TABLE%(%FIELDS%) values(%VALUES%)";

        $v = $this->parseValue(array_values($data));

        $sql = str_replace(
            array('%TABLE%', '%FIELDS%', '%VALUES%'),
            array(
                $this->parseTable(),
                $this->parseAddFields(array_keys($data)),
                join(',', $v),
            ),
            $sql
        );

        $this->sql = $sql;

        return $this->exec($sql, true);
    }

    public function exec($sql, $insertId = false)
    {
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            if ($insertId) {
                return mysqli_insert_id($this->link);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }

    protected function parseValue($value)
    {
        if (is_string($value)) {
            $value = '\'' . $value . '\'';
        } elseif (is_array($value)) {
            $value = array_map(array($this, 'parseValue'), $value);
        } elseif (is_null($value)) {
            $value = 'null';
        }
        return $value;
    }

    protected function parseAddFields($fields)
    {
        return join(',', array_intersect($this->fields, $fields));

    }

    public function select()
    {
        $sql = 'select %FIELDS% from %TABLE% %WHERE% %GROUP% %HAVING% %ORDER% %LIMIT%';
        $sql = str_replace(
            array('%FIELDS%', '%TABLE%', '%WHERE%', '%GROUP%', '%HAVING%', '%ORDER%', '%LIMIT%'),
            array(
                $this->parseFields(isset($this->options['fields']) ? $this->options['fields'] : null),
                $this->parseTable(),
                $this->parseWhere(),
                $this->parseGroup(),
                $this->parseHaving(),
                $this->parseOrder(),
                $this->parseLimit(),
            ),
            $sql
        );

        $this->sql = $sql;
        //echo $sql . '<br>';
        $data = $this->query($sql);
        return $data;
    }

    public function __get($key)
    {
        if ($key == 'sql') {
            return $this->sql;
        }
    }

    protected function parseLimit()
    {
        if (empty($this->options['limit'][0])) {
            $limit = '';
        } else {
            if (is_string($this->options['limit'][0])) {
                $limit = ' LIMIT ' . $this->options['limit'][0];
            } elseif (is_array($this->options['limit'][0])) {
                //5,6
                $limit = join(',', $this->options['limit'][0]);
                $limit = ' LIMIT ' . $limit;
            } else {
                $limit = '';
            }

            return $limit;
        }
    }

    protected function parseOrder()
    {
        if (empty($this->options['order'][0])) {
            return '';
        } else {
            return ' ORDER BY ' . $this->options['order'][0];
        }
    }

    protected function parseHaving()
    {
        if (empty($this->options['having'][0])) {
            return '';
        } else {
            return ' HAVING ' . $this->options['having'][0];
        }
    }

    protected function parseGroup()
    {
        if (empty($this->options['group'][0])) {
            return '';
        } else {
            return ' GROUP BY ' . $this->options['group'][0];
        }
    }

    protected function parseWhere()
    {
        if (empty($this->options['where'][0])) {
            return '';
        } else {
            return 'WHERE ' . $this->options['where'][0];
        }

    }

    protected function parseTable()
    {
        if (empty($this->options['table'])) {
            return $this->table;
        } else {
            return $this->options['table'];
        }
    }

    protected function parseFields($options = null)
    {

        if (empty($options[0])) {
            $fields = join(',', $this->fields);

        } else {
            if (is_string($options[0])) {
                $f      = explode(',', $options[0]);
                $fields = array_intersect($this->fields, $f);
                $fields = join(',', $fields);

            }

            if (is_array($options[0])) {
                $fields = array_intersect($this->fields, $options[0]);
                $fields = join(',', $fields);

            }
        }
        return $fields;
    }

    public function getby($field, $args)
    {
        $sql = 'select ' . $this->parseFields() . ' from ' . $this->table . ' where ' . $field . '="' . $args[0] . '"';

        return $this->query($sql);
    }

    public function __call($func, $args)
    {
        if (in_array($func, array('fields', 'table', 'where', 'limit', 'group', 'having', 'order'))) {
            $this->options[$func] = $args;
            return $this;
        } elseif (strtolower(substr($func, 0, 5)) == 'getby') {
            $field = substr($func, 5);
            return $this->getby($field, $args);
        } else {
            exit('不存在的方法' . $func);
        }

    }

    protected function getFields()
    {
        $cacheFile = 'cache/' . $this->table . '.php';

        if (file_exists($cacheFile)) {
            return include $cacheFile;
        } else {

            $sql    = 'desc ' . $this->table;
            $data   = $this->query($sql);
            $fields = [];
            foreach ($data as $val) {
                $fields[] = $val['Field'];
                if ($val['Key'] == 'PRI') {
                    $fields['_pk'] = $val['Field'];
                }
            }
            $string = "<?php \n return " . var_export($fields, true) . ';?>';

            file_put_contents($cacheFile, $string);
            return $fields;
        }
    }

    public function query($sql)
    {
        $result = mysqli_query($this->link, $sql);
        if ($result) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }

    }

    protected function connect()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pwd);
        if (!$conn) {
            return false;
        }

        mysqli_set_charset($conn, $this->charset);
        mysqli_select_db($conn, $this->dbName);
        return $conn;

    }

    protected function close()
    {
        mysqli_close($this->link);
    }

    protected function getTableName()
    {
        if (isset($this->table)) {
            $table = $this->prefix . $this->table;
        } else {
            if ($pos = strrpos(get_class($this), '\\')) {
                $className = substr(get_class($this), $pos + 1);
                $table     = $this->prefix . strtolower(substr($className, 0, -5));
            } else {
                $table = $this->prefix . strtolower(substr(get_class($this), 0, -5));
            }

        }
        return $table;
    }

    public function __destruct()
    {
        $this->close();
    }

}
