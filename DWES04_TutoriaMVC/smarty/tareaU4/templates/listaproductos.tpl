{foreach from=$productos item=producto}
    <p>
        {if $producto->getfamilia() == 'ORDENA'}
        <a href='muestraordenador.php?cod={$producto->getcodigo()}'>
            {/if}
            <form id='{$producto->getcodigo()}' action='productos.php' method='post'>
                <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
                <input type='submit' name='enviar' value='Añadir'/>
                {$producto->getnombrecorto()}: {$producto->getPVP()} euros.
            </form>
            {if $producto->getfamilia() == 'ORDENA'}
        </a>
        {/if}
    </p>
{/foreach}
