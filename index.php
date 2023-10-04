<?php
printf("Bem-Vindo ao Memorizador de Texto" . PHP_EOL);

$textoParaMemorizar = readline("Escreva o Texto no qual você quer memorizar: ");

print($textoParaMemorizar . PHP_EOL);

$palavrasSeparadasTexto = explode(" ", $textoParaMemorizar);

$palavrasRemovidas = array();

while(count($palavrasRemovidas) <= count($palavrasSeparadasTexto))
{
    $textoConfimacao = readline("Digite seu texto novamente: ");

    if($textoConfimacao !== $textoParaMemorizar)
    {
        while ($textoConfimacao !== $textoParaMemorizar)
        {
            $textoConfimacao = readline("Você errou, tente novamente: ");
        }
    }

    $palavraAleatoria = array_rand($palavrasSeparadasTexto);

    if(in_array($palavraAleatoria, $palavrasRemovidas))
    {
        while(in_array($palavraAleatoria, $palavrasRemovidas) && 
              count($palavrasRemovidas) < count($palavrasSeparadasTexto))
        {
            $palavraAleatoria = array_rand($palavrasSeparadasTexto);
        }
    }

    array_push($palavrasRemovidas, $palavraAleatoria);

    $chavePalavra = $palavraAleatoria;

    $palavrasSeparadasTexto[$chavePalavra] = "_";

    printf(implode(" ", $palavrasSeparadasTexto) . PHP_EOL);
}

printf("Você conseguiu, decorou o texto!" . PHP_EOL);
?>
