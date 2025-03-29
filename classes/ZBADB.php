<?php
namespace zbaclass;

class ZBADB
{

    protected $wpdb;
    protected $tablename;
    public $query;

    public function __construct($table)
    {
        global $wpdb;

        $this->wpdb      = $wpdb;
        $this->tablename = $wpdb->prefix . 'zba_' . $table;

    }

    public function insert(array $data): int | false
    {

        $format = [  ];
        foreach ($data as $key => $value) {

            if (is_array($value)) {$value = serialize($value);}

            $data[ $key ] = $value;
            $format[  ]   = $this->set_type($value);

        }

        $inserted = $this->wpdb->insert(
            $this->tablename,
            $data,
            $format

        );
        $this->query = $this->wpdb->last_query;
        return ($inserted) ? $this->wpdb->insert_id : false;

    }

    public function get(array $data, string $output = OBJECT): object | array | false
    {

        if (empty($data)) {return false;}

        $where = '1=1';

        foreach ($data as $key => $value) {
            $where .= $this->wpdb->prepare(' AND %i = ' . $this->set_type($value), $key, $value);
        }

        $this->query = "SELECT * FROM `$this->tablename` WHERE $where";

        $result = $this->wpdb->get_row(
            $this->query,
            $output
        );

        return $result;
    }

    public function num(array $data = [  ], string $where = ''): int | string
    {
        $sqlwhere = "";

        if (! empty($where)) {

            $sqlwhere = " AND  $where ";

        }

        if (! empty($data)) {

            foreach ($data as $key => $value) {

                switch ($this->set_type($value)) {
                    case '%s':
                        $value = "'$value'";
                        break;
                    default:
                        $value = $value;
                        break;
                }

                $sqlwhere .= " AND  `$key` = $value ";
            }
        }
        $this->query = "SELECT COUNT(*) FROM $this->tablename WHERE 1=1  $sqlwhere ";

        $num = $this->wpdb->get_var($this->query);

        return absint($num);

    }

    public function update(array $data, array $where): int | false
    {

        if (! $data && ! $where) {
            return false;
        }

        $format = $where_format = [  ];

        foreach ($data as $value) {
            $format[  ] = $this->set_type($value);
        }

        foreach ($where as $value) {
            $where_format[  ] = $this->set_type($value);

        }

        $result = $this->wpdb->update(
            $this->tablename,
            $data,
            $where,
            $format,
            $where_format
        );
        $this->query = $this->wpdb->last_query;
        return $result;
    }

    public function select(array $args = [  ]): array | object | null
    {
        $where = '1=1 ';

        if (isset($args[ 'data' ])) {
            foreach ($args[ 'data' ] as $key => $value) {

                if (is_array($value)) {

                    $value = implode(',', $value);
                    $where .= $this->wpdb->prepare(" AND  %i IN ( $value )", $key);

                } else {
                    $where .= $this->wpdb->prepare(' AND %i = ' . $this->set_type($value), $key, $value);

                }

            }
        }

        if (isset($args[ 's' ])) {
            $where .= $this->wpdb->prepare(" AND %i LIKE %s", $args[ 's' ][ 0 ], '%' . $args[ 's' ][ 1 ] . '%');
        }

        if (isset($args[ 'where' ])) {
            $where .= " AND  {$args[ 'where' ]} ";
        }

        if (isset($args[ 'order_by' ])) {
            $where .= $this->wpdb->prepare(" ORDER BY %i " . $args[ 'order_by' ][ 1 ], $args[ 'order_by' ][ 0 ]);
        }
        if (isset($args[ 'per_page' ])) {
            $where .= $this->wpdb->prepare(" LIMIT %d ", absint($args[ 'per_page' ]));
        }

        if (isset($args[ 'offset' ])) {
            $where .= $this->wpdb->prepare(" OFFSET %d ", absint($args[ 'offset' ]));
        }

        $star = (isset($args[ 'star' ])) ? $args[ 'star' ] : "*";

        $this->query = "SELECT $star FROM `$this->tablename` WHERE  $where ";

        $mpn_row = $this->wpdb->get_results($this->query);

        return $mpn_row;

    }

    public function delete(array $data): int | false
    {
        $format = [  ];
        foreach ($data as $key => $value) {
            $data[ $key ] = $value;
            $format[  ]   = $this->set_type($value);
        }

        $result = false;
        if (! empty($data)) {

            $result = $this->wpdb->delete(
                $this->tablename,
                $data,
                $format

            );
            $this->query = $this->wpdb->last_query;

        }

        return $result;

    }

    public function sum(string $object, array $data, string $where = ""): int | string
    {

        $sqlwhere = "";

        if (! empty($where)) {

            $sqlwhere = " AND  $where ";

        }

        if (! empty($data)) {

            foreach ($data as $key => $value) {

                switch ($this->set_type($value)) {
                    case '%s':
                        $value = "'$value'";
                        break;
                    default:
                        $value = $value;
                        break;
                }

                $sqlwhere .= " AND  `$key` = $value ";
            }
        }
        $this->query = "SELECT SUM($object) FROM `$this->tablename` WHERE 1=1 $sqlwhere ";

        $num = $this->wpdb->get_var($this->query);

        return absint($num);

    }

    protected function set_type($item)
    {
        switch (gettype($item)) {
            case 'integer':
                return '%d';
                break;

            case 'string':
                return '%s';
                break;

            default:
                return '%d';
                break;
        }

    }

    public function empty()
    {
        $this->query = "TRUNCATE `$this->tablename`  ";

        $empty = $this->wpdb->get_results($this->query);

        return $empty;

    }

}
