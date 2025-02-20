<?php
namespace zbaclass;

class ZBAOption
{

    protected $option;
    private $option_name = 'zba_option';

    public function __construct()
    {

        $this->option = get_option($this->option_name);

        if (! isset($this->option[ 'version' ]) || version_compare(ZBA_VERSION, $this->option[ 'version' ], '>')) {

            $this->option = [
                'version'          => ZBA_VERSION,
                'receive_sms_text' => (isset($this->option[ 'receive_sms_text' ])) ? $this->option[ 'receive_sms_text' ] : '',

             ];

            $this->update($this->option);

        }

    }

    public function update($option)
    {

        update_option($this->option_name, $option);

    }

    public function get($select = '')
    {
        $option = $this->option;

        return (empty($select) || ! isset($option[ $select ])) ? $option : $option[ $select ];

    }

    public function set($data)
    {

        $this->option = $this->option;
        foreach ($data as $key => $value) {

            if ($key === "set_timer") {
                $value = absint($value);
            }

            $this->option[ $key ] = $value;

        }

        $this->update($this->option);

        $this->option = $this->option;

        return $this;
    }
}
