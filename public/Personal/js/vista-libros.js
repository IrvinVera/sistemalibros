$(document).ready(function(){
    $('#TablaLibros').DataTable({
        responsive: true,
        fixedHeader: true,
        processing: true,
        pageLength: 10,
        searching: true,
        language: {
            url: routeBase+'/Personal/js/DataTable_Spanish.json'
        },
        ajax: {
            url: "obtener-libros",
            type: "GET"
        },
        columns: [
            { data:"nombre",     className: 'text-uppercase text-center fila' },
            { data:"autor",     className: 'text-uppercase text-center fila' },
            { data:"fecha",     className: 'text-uppercase text-center fila' },
            { data:"categoria",  className: 'text-uppercase text-center fila' },
            { data:"disponible",  className: 'text-uppercase text-center fila' },
            { data:"adquiridor" ,     className: 'text-uppercase text-center fila' },
            { data:"Acciones" ,      className: 'text-uppercase text-center ' }
        ],   
    });

      

});