{foreach from=$productos item=producto}
    <p>
    <form id='{$producto->getcodigo()}' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
        <input type='submit' name='enviar' value='Añadir'/>
        {if $producto->getfamilia() eq "ORDENA"}
            <a href="ordenador.php?codigo={$producto->getcodigo()}"> {$producto->getnombrecorto()}
                : {$producto->getPVP()} euros.</a>
        {else}
            {$producto->getnombrecorto()}: {$producto->getPVP()} euros.
        {/if}
    </form>
    </p>
{/foreach}
