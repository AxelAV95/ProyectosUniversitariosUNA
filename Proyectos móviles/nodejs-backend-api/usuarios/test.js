const Database = require('./data/data');

// Llamamos al método conectar() de la clase Database
const connection = Database.conectar();

// Comprobamos si la conexión se estableció correctamente
connection.connect((error) => {
  if (error) {
    console.error('Error al conectar a la base de datos:', error);
  } else {
    console.log('Conexión exitosa a la base de datos');
    // Aquí puedes realizar otras operaciones con la base de datos si lo deseas
  }
});

// Luego, para desconectar la conexión:
Database.desconectar();
