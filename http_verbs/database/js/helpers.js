function deleteUser(userId) {

    // Objeto con los datos a enviar
    /*const datos = {
        userId: userId
    };
    console.log(datos);*/
    // Enviar la solicitud DELETE
    fetch('http://localhost/php/database/user/' +  userId, {
        method: 'DELETE',
        /*headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)*/
    })
    .then(response => {

        if (response.ok) {
            console.log(response);
            console.log('Usuario eliminado correctamente');
            
            //window.location.href = 'otra-pagina.html';

        } else {
            console.error('Error al eliminar usuario');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}