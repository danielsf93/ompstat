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
    
    
    
    
    public function getDownloadsPorMes() {
        // Consulta para obter métricas com assoc_type = 515, agrupadas por data e ordenadas
        $sql = '
            SELECT DATE(date) as data, SUM(metric) as total
            FROM metrics_submission
            WHERE assoc_type = 515
            GROUP BY DATE(date)
            ORDER BY data ASC
        ';
        
        $result = $this->retrieve($sql);
    
        $downloadsPorMes = []; // Lista para armazenar os dados
    
        if ($result) {
            foreach ($result as $row) {
                if (isset($row->data, $row->total)) { // Verifica se os campos necessários existem
                    $downloadsPorMes[] = [
                        'data' => $row->data,
                        'total' => (int) $row->total,
                    ];
                }
            }
        }
    
        return $downloadsPorMes; // Retorna a lista de downloads por data
    }
    
    public function getacessosPorMes() {
        
        $sql = '
            SELECT DATE(date) as data, SUM(metric) as total
            FROM metrics_submission
            WHERE assoc_type = 1048585
            GROUP BY DATE(date)
            ORDER BY data ASC
        ';
        
        $result = $this->retrieve($sql);
    
        $acessosPorMes = []; // Lista para armazenar os dados
    
        if ($result) {
            foreach ($result as $row) {
                if (isset($row->data, $row->total)) { // Verifica se os campos necessários existem
                    $acessosPorMes[] = [
                        'data' => $row->data,
                        'total' => (int) $row->total,
                    ];
                }
            }
        }
    
        return $acessosPorMes; // Retorna a lista de Acessos por data
    }



    public function getTop3LivrosMaisAcessados() {
        // Primeiro passo: Soma dos valores de 'metric' para cada 'submission_id'
        $sql = '
            SELECT submission_id, SUM(metric) as total_metric
            FROM metrics_submission
            WHERE assoc_type = 1048585
            GROUP BY submission_id
            ORDER BY total_metric DESC
            LIMIT 3 
        ';
    
        $result = $this->retrieve($sql);
    
        $top3Livros = []; // Lista para armazenar os dados do Top 3
    
        if ($result) {
            foreach ($result as $row) {
                if (isset($row->submission_id, $row->total_metric)) {
                    $top3Livros[] = [
                        'submission_id' => $row->submission_id,
                        'total_metric' => (int) $row->total_metric,
                    ];
                }
            }
        }
    
        return $top3Livros; // Retorna a lista dos Top 3 livros
    }
    






}
