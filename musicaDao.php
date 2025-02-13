<?php 
require_once("modelo/Musica.php");
require_once("util/Conexao.php");

class musicaDao{
    public function inserirMusica(Musica $musica) {
        $sql = "INSERT INTO Musica 
        (nome, cantor, album, anoLancamento, autor, favorita) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);

        $stm->execute(array(
            $musica->getNome(),
            $musica->getCantor(),
            $musica->getAlbum(),
            $musica->getAnoLancamento(),
            $musica->getAutor(),
            $musica->getFavorita()
        ));
    }

    public function listarMusicas() {
        $sql = "SELECT * FROM Musica";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        $stm->execute();
        $registros = $stm->fetch();

        $musicas = $this->mapMusicas($registros);
        
        return $musicas;
    }

    public function buscarMusicaPorId($id) {
        $sql = "SELECT * FROM Musica where id = ? ";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        $stm->execute([$id]);
        $registro = $stm->fetch();

        if ($registro) {
            return $this->mapMusica($registro);
        }
        
        return null;
    }

    public function excluirMusica($id) {
        $sql = "DELETE FROM Musica";
        $con = Conexao::getCon();
        $stm = $con->prepare($sql);
        
        return $stm->execute([$id]);
    }

    private function mapMusicas(array $registros) {
        $musicas = array();
        
        foreach ($registros as $reg) {
            $musica = $this->mapMusica($reg);
            array_push($musicas, $musica);
        }
        
        return $musicas;
    }

    private function mapMusica(array $reg) {
        $musica = new Musica();
        $musica->setId($reg['id']);
        $musica->setNome($reg['nome']);
        $musica->setCantor($reg['cantor']);
        $musica->setAlbum($reg['album']);
        $musica->setAnoLancamento($reg['anoLancamento']);
        $musica->setAutor($reg['autor']);
        $musica->setFavorita($reg['favorita']);

        return $musica;
    }
}
