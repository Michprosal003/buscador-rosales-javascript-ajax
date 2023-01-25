<!-----Estableciendo una conexion a la base de datos--->

<?php 

$conn=mysqli_connect("localhost","root","","uip");
$output='';
if(isset($_POST['query']))
{
    $search=mysqli_real_escape_string($conn,$_POST['query']);
    $query="SELECT * FROM curso WHERE Nombre LIKE '%".$search."%' OR Apellido LIKE '%".$search."%' OR Codigo LIKE '%".$search."%' OR Materia LIKE '%".$search."%'  OR Nota LIKE '%".$search."%' OR Jornada LIKE '%".$search."%'  OR Estado LIKE '%".$search."%'";
}

else 
{
    $query="SELECT * FROM curso ORDER BY ID";
}

$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0) 
{
    $output.='
    <table class="table table-bordered table-striped table-hovered">
    <tr>
    <td>NOMBRE</td>
    <td>APELLIDO</td>
    <td>CODIGO</td>
    <td>MATERIA</td>
    <td>NOTA</td>
    <td>JORNADA</td>
    <td>ESTADO</td>
    </tr>
    
    ';


    while($row=mysqli_fetch_array($result))
    {
    
        $output.='
        <tr>
        <td>'.$row['Nombre'].'</td>
        <td>'.$row['Apellido'].'</td>
        <td>'.$row['Codigo'].'</td>
        <td>'.$row['Materia'].'</td>
        <td>'.$row['Nota'].'</td>
        <td>'.$row['Jornada'].'</td>
        <td>'.$row['Estado'].'</td>
       
        
        ';
    }
    echo $output;
}
else 
{
    echo"No se ha encontrado ningun resultado del Curso para su Busqueda";
}



?>