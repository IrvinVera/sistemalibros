<div class="breadcrumb col-md-2">
    <!-- <h1 class="mr-2" style="color:black;">
        BIENVENIDO 
    </h1> -->
    
    <ul>
        <li style="color:black;">
            <h1>BIENVENIDO</h1>
        </li>
        <li style="color:black; margin-top:20px;">
            {{ auth()->user()->DatosPersonales['nombres'] }} {{ auth()->user()->DatosPersonales['primer_apellido'] }}
        </li>
    </ul>
    
    </ul>
</div>