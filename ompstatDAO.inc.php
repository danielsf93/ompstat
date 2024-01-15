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











}
