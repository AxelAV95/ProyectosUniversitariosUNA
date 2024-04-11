const mysql = require('mysql');

class Database {
  constructor() {
    this.pool = mysql.createPool({
      host: 'localhost',
      user: 'root',
      password: '',
      database: 'bdusuario',
      connectionLimit: 100, // Número máximo de conexiones en el pool
    });
  }

  obtenerPool() {
    return this.pool;
  }
}

module.exports = Database;

// const mysql = require('mysql');

// class Database {
//   constructor() {
//     this.connection = null;
//   }

//   conectar() {
//     if (!this.connection) {
//       this.connection = mysql.createConnection({
//         host: 'localhost',
//         user: 'root',
//         password: '',
//         database: 'bdusuario'
//       });
//     }

//     return this.connection;
//   }

//   desconectar() {
//     if (this.connection) {
//       this.connection.end();
//       this.connection = null;
//     }
//   }
// }

// module.exports = Database;
