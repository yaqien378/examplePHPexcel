<?php
class User_model extends CI_Model
{
    protected $tabel = 'user';
    protected $key   = 'id';

    function getAll()
    {
        return $this->db->order_by('id', 'DESC')->get( $this->tabel )->result();
    }

    function getId( $id )
    {
        return $this->db->get_where( $this->tabel, array( $this->key => $id ) )->row();
    }

    function getWhere( $arrWhere = array() )
    {
        return $this->db->get_where( $this->tabel, $arrWhere )->result();
    }

    function add( $data )
    {
        return $this->db->insert( $this->tabel, $data);
    }

    function update( $id, $data )
    {
        return $this->db->update( $this->tabel, $data, array( $this->key => $id ) );
    }

    function delete( $id )
    {
        return $this->db->delete( $this->tabel, array( $this->key => $id ) );
    }

    function getLastId()
    {
        $newId = 0;
        $row   = $this->db->select_max( $this->key, 'id' )->get( $this->tabel )->row();
        if ( $row->id == '' ) {
            $newId = 1;
        } else {
            $newId = abs( $row->id ) + 1;
        }
        return $newId;
    }
}
