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
            'SELECT SUM(metric) as total FROM metrics_submission WHERE assoc_type IN (256, 1048585)'
        );
        foreach ($result as $row) {
            return $row->total;
        }
        return 0; // Retorna 0 se não houver resultados
    }

    public function gettotalDownloads() {
        $result = $this->retrieve(
            'SELECT SUM(metric) as total FROM metrics_submission WHERE assoc_type IN (515)'
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

    public function totalAutores() {
        /*** A quantidade de autores é obtida pela quantidade de emails utilizados nas publicações. 
        não se utiliza autores da tabela usuários, pois muitos podem estar cadastrados como autores,
        mas podem nunca ter publicado */
        $result = $this->retrieve(
            'SELECT DISTINCT email FROM authors'
        );
    
        $totalAutores = []; // Lista para armazenar os e-mails únicos
    
        // Verifica se há resultados e itera para adicionar e-mails à lista
        if ($result) {
            foreach ($result as $row) { // Itera sobre os resultados
                if (isset($row->email)) { // Verifica se a coluna 'email' existe
                    $totalAutores[] = $row->email; // Adiciona o e-mail à lista
                }
            }
        }
    
        return $totalAutores; // Retorna a lista de e-mails únicos
    }
    
/*** 
    public function getyearsList() {
        $result = $this->retrieve(
            'SELECT DISTINCT SUBSTRING(month, 1) as month FROM metrics WHERE submission_id IS NOT NULL'
        );
    
        $monthsList = array();
    
        foreach ($result as $row) {
            $monthsList[] = $row->month;
        }
    
        return array_unique($monthsList);
    }

    public function getMetricsPorMes($mes) {
        $result = $this->retrieve(
            'SELECT SUM(metric) as total FROM metrics WHERE submission_id IS NOT NULL AND assoc_type = 1048585 AND SUBSTRING(month, 1) = ?',
            [$mes]
        );
    
        foreach ($result as $row) {
            return $row->total;
        }
    
        return 0;
    }
    
   **/






}
