<?php
// plugins/generic/ompstat/ompstatDAO.inc.php
import('lib.pkp.classes.db.DAO');
import('lib.pkp.classes.db.DAORegistry');

class ompstatDAO extends DAO {
    public function __construct() {
        parent::__construct();
    }

    public function getLivrosPublicados() {
        $result = $this->retrieve(
            'SELECT COUNT(*) as total FROM publications WHERE status = 3;'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function gettotalAcessos() {
        $result = $this->retrieve(
            'SELECT SUM(metric) as total FROM metrics WHERE assoc_type IN (256, 1048585)'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function gettotalDownloads() {
        $result = $this->retrieve(
            'SELECT SUM(metric) as total FROM metrics WHERE assoc_type IN (515)'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }


    public function getseriesPublicadas() {
        $result = $this->retrieve(
            'SELECT COUNT(*) as total FROM series WHERE is_inactive = 0'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function gettotalCategorias() {
        $result = $this->retrieve(
            'SELECT COUNT(*) as total FROM categories WHERE context_id = 1'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function gettotalUsuarios() {
        $result = $this->retrieve(
            'SELECT COUNT(*) as total FROM users'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function getyearsList() {
        $result = $this->retrieve(
            'SELECT DISTINCT month FROM metrics WHERE submission_id IS NOT NULL'
        );
    
        $yearsList = array();
    
        foreach ($result as $row) {
            $yearsList[] = $row->month;
        }
    
        return implode(', ', $yearsList);
    }
    






}
