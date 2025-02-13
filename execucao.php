<?php
require_once("modelo/Musica.php");
require_once("musicaDao.php");

echo "------------------------------------------------------\n";
echo "-                 BuscadorDeMusica.com               -\n";
echo "-                                                    -\n";
echo "- Encontre as informações das suas músicas favoritas!-\n";
echo "-                                                    -\n";
echo "-1-Cadastre Músicas.                                 -\n";
echo "-2-Listar Minhas Músicas Favoritas.                  -\n";
echo "-3-Buscar Música.                                    -\n";
echo "-4-Excluir Música                                    -\n";
echo "-0-Sair                                             -\n";

$opcao = readline("Informe a opção: ");
switch ($opcao) {
    case 1:
        $musica = new Musica;
        $musica->setNome(readline("Informe o título da música: \n"));
        $musica->setCantor(readline("Informe o nome do cantor: \n"));
        $musica->setAlbum(readline("Informe o nome do álbum: \n"));
        $musica->setAnoLancamento(readline("Informe o ano de lançamento: \n"));
        $musica->setAutor(readline("Informe o nome do compositor: \n"));
        $musica->setFavorita(readline("É uma música favorita? (1 para Sim, 0 para Não): \n"));

        $MusicaDao = new musicaDao;
        $MusicaDao->inserirMusica($musica);

        echo "Música cadastrada com sucesso! \n \n";
        break;
    case 2:
        $MusicaDao = new musicaDao;
        $musicas = $MusicaDao->listarMusicas();

        foreach ($musicas as $m) {
            printf("%d- %s | %s | %s | %s | %s | Favorita: %s\n",
                $m->getId(),
                $m->getNome(),
                $m->getCantor(),
                $m->getAlbum(),
                $m->getAnoLancamento(),
                $m->getAutor(),
                $m->getFavorita() ? "Sim" : "Não"
            );
        }
        break;
    case 3:
        $id = readline("Informe o ID da música: ");
        $MusicaDao = new MusicaDao;
        $musica = $MusicaDao->buscarMusicaPorId($id);

        if ($musica) {
            echo "Música encontrada:\n";
            printf("%d- %s | %s | %s | %s | %s | Favorita: %s\n",
                $musica->getId(),
                $musica->getNome(),
                $musica->getCantor(),
                $musica->getAlbum(),
                $musica->getanoLancamento(),
                $musica->getAutor(),
                $musica->getFavorita() ? "Sim" : "Não"
            );
        } else {
            echo "Música não encontrada.\n";
        }
        break;
    case 4:
        $id = readline("Informe o ID da música a ser excluída: ");
        $MusicaDao = new musicaDao;
        $resultado = $MusicaDao->excluirMusica($id);

        if ($resultado) {
            echo "Música excluída com sucesso!\n";
        } else {
            echo "Erro ao excluir música ou música não encontrada.\n";
        }
        break;
    default:
        echo "Programa encerrado";
        break;
}
while ($opcao != 0);
