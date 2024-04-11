const Database = require('./data'); 
require('../domain/usuario');

class UsuarioData extends Database {
    constructor() {
        super();
      }
      
  async insertarUsuario(usuario) {
    try {
      const pool = this.obtenerPool();
      const connection = await this.getConnection(pool);

      const usuarionombre = usuario.getUsuarionombre();
      const usuariocorreo = usuario.getUsuariocorreo();
      const usuariopassword = usuario.getUsuariopassword();
      const usuariotipo = usuario.getUsuariotipo();
      const usuariofecharegistro = usuario.getUsuariofecharegistro();
      const usuarioestado = usuario.getUsuarioestado();

      const query = 'CALL InsertarUsuario(?, ?, ?, ?, ?, ?)';
      const values = [usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado];

      return new Promise((resolve, reject) => {
        connection.query(query, values, (error, resultado) => {
          connection.release(); // Liberar la conexión después de su uso
          if (error) {
            console.error('Error al insertar el usuario:', error);
            reject(error);
          } else {
            resolve(resultado.insertId);
          }
        });
      });
    } catch (error) {
      console.error('Error al insertar el usuario:', error);
      return null;
    }
  }

  async actualizarUsuario(usuario) {
    try {
      const pool = this.obtenerPool();
      const connection = await this.getConnection(pool);

      const usuarioid = usuario.getUsuarioid();
      const usuarionombre = usuario.getUsuarionombre();
      const usuariocorreo = usuario.getUsuariocorreo();
      const usuariopassword = usuario.getUsuariopassword();
      const usuariotipo = usuario.getUsuariotipo();
      const usuariofecharegistro = usuario.getUsuariofecharegistro();
      const usuarioestado = usuario.getUsuarioestado();

      const query = 'CALL ActualizarUsuario(?, ?, ?, ?, ?, ?, ?)';
      const values = [usuarioid, usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado];

      return new Promise((resolve, reject) => {
        connection.query(query, values, (error) => {
          connection.release(); // Liberar la conexión después de su uso
          if (error) {
            console.error('Error al actualizar el usuario:', error);
            reject(false);
          } else {
            resolve(true);
          }
        });
      });
    } catch (error) {
      console.error('Error al actualizar el usuario:', error);
      return false;
    }
  }

  async eliminarUsuario(usuarioid) {
    try {
      const pool = this.obtenerPool();
      const connection = await this.getConnection(pool);

      const query = 'CALL EliminarUsuario(?)';
      const values = [usuarioid];

      return new Promise((resolve, reject) => {
        connection.query(query, values, (error) => {
          connection.release(); // Liberar la conexión después de su uso
          if (error) {
            console.error('Error al eliminar el usuario:', error);
            reject(false);
          } else {
            resolve(true);
          }
        });
      });
    } catch (error) {
      console.error('Error al eliminar el usuario:', error);
      return false;
    }
  }
      // async insertarUsuario(usuario) {
      //   const connection = this.conectar();
      //   try {
      //     const usuarionombre = usuario.getUsuarionombre();
      //     const usuariocorreo = usuario.getUsuariocorreo();
      //     const usuariopassword = usuario.getUsuariopassword();
      //     const usuariotipo = usuario.getUsuariotipo();
      //     const usuariofecharegistro = usuario.getUsuariofecharegistro();
      //     const usuarioestado = usuario.getUsuarioestado();
      
      //     const query = 'CALL InsertarUsuario(?, ?, ?, ?, ?, ?)';
      //     const values = [usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado];
      
      //     return new Promise((resolve, reject) => {
      //       connection.query(query, values, (error, resultado) => {
      //         if (error) {
      //           console.error('Error al insertar el usuario:', error);
      //           reject(error);
      //         } else {
      //           resolve(resultado.insertId);
      //         }
      //       });
      //     });
      //   } catch (error) {
      //     console.error('Error al insertar el usuario:', error);
      //     return null;
      //   }
      // }
      
      // async actualizarUsuario(usuario) {
      //   const connection = this.conectar();
      //   try {
      //     const usuarioid = usuario.getUsuarioid();
      //     const usuarionombre = usuario.getUsuarionombre();
      //     const usuariocorreo = usuario.getUsuariocorreo();
      //     const usuariopassword = usuario.getUsuariopassword();
      //     const usuariotipo = usuario.getUsuariotipo();
      //     const usuariofecharegistro = usuario.getUsuariofecharegistro();
      //     const usuarioestado = usuario.getUsuarioestado();
      
      //     const query = 'CALL ActualizarUsuario(?, ?, ?, ?, ?, ?, ?)';
      //     const values = [usuarioid, usuarionombre, usuariocorreo, usuariopassword, usuariotipo, usuariofecharegistro, usuarioestado];
      
      //     return new Promise((resolve, reject) => {
      //       connection.query(query, values, (error) => {
      //         if (error) {
      //           console.error('Error al actualizar el usuario:', error);
      //           reject(false);
      //         } else {
      //           resolve(true);
      //         }
      //       });
      //     });
      //   } catch (error) {
      //     console.error('Error al actualizar el usuario:', error);
      //     return false;
      //   }
      // }
      
      // async eliminarUsuario(usuarioid) {
      //   const connection = this.conectar();
      //   try {
      //     const query = 'CALL EliminarUsuario(?)';
      //     const values = [usuarioid];
      
      //     return new Promise((resolve, reject) => {
      //       connection.query(query, values, (error) => {
      //         if (error) {
      //           console.error('Error al eliminar el usuario:', error);
      //           reject(false);
      //         } else {
      //           resolve(true);
      //         }
      //       });
      //     });
      //   } catch (error) {
      //     console.error('Error al eliminar el usuario:', error);
      //     return false;
      //   }
      // }      
      async obtenerUsuarios() {
        try {
          const pool = this.obtenerPool();
          const connection = await this.getConnection(pool);
    
          const query = 'CALL ObtenerUsuarios()';
    
          return new Promise((resolve, reject) => {
            connection.query(query, (error, usuarios) => {
              connection.release(); // Liberar la conexión después de su uso
              if (error) {
                console.error('Error al obtener los usuarios:', error);
                reject(error);
              } else {
                resolve(usuarios);
              }
            });
          });
        } catch (error) {
          console.error('Error al obtener los usuarios:', error);
          return null;
        }
      }
    
      async obtenerDatosUsuario(usuarioid) {
        try {
          const pool = this.obtenerPool();
          const connection = await this.getConnection(pool);
    
          const query = 'CALL obtenerDatosUsuario(?)';
          const values = [usuarioid];
    
          return new Promise((resolve, reject) => {
            connection.query(query, values, (error, datos) => {
              connection.release(); // Liberar la conexión después de su uso
              if (error) {
                console.error('Error al obtener los datos del usuario:', error);
                reject(error);
              } else {
                resolve(datos);
              }
            });
          });
        } catch (error) {
          console.error('Error al obtener los datos del usuario:', error);
          return null;
        }
      }
    
      async getConnection(pool) {
        return new Promise((resolve, reject) => {
          pool.getConnection((error, connection) => {
            if (error) {
              console.error('Error en la conexión a la base de datos:', error);
              reject(error);
            } else {
              resolve(connection);
            }
          });
        });
      }
    //   async obtenerUsuarios() {
    //     const connection = this.conectar();
    //     try {
    //       const query = 'CALL ObtenerUsuarios()';
      
    //       return new Promise((resolve, reject) => {
    //         connection.query(query, (error, usuarios) => {
    //           if (error) {
    //             console.error('Error al obtener los usuarios:', error);
    //             reject(error);
    //           } else {
    //             resolve(usuarios);
    //           }
    //         });
    //       });
    //     } catch (error) {
    //       console.error('Error al obtener los usuarios:', error);
    //       return null;
    //     }
    //   }

    //   async obtenerDatosUsuario(usuarioid) {
    //     const connection = this.conectar();
    //     try {
    //       const query = 'CALL obtenerDatosUsuario(?)';
    //       const values = [usuarioid];
    //       return new Promise((resolve, reject) => {
    //         connection.query(query, values, (error, datos) => {
    //           if (error) {
    //             console.error("Error al obtener los datos del usuario:", error);
    //             reject(error);
    //           } else {
    //             resolve(datos);
    //           }
    //           connection.end(); // Cerrar la conexión después de la consulta.
    //         });
    //       });
    //     } catch (error) {
    //       console.error('Error al obtener los datos del usuario:', error);
    //       return null;
    //     }
    // }

      
  
    
  }
  
  module.exports = UsuarioData

  // Ejemplo de uso
  /*const ud = new UsuarioData();
ud.eliminarUsuario(1)
.then((usuarios) => {
  console.log(usuarios);
})
.catch((error) => {
  console.error('Error al obtener los usuarios:', error);
});*/

// const ud = new UsuarioData()
// ud.obtenerDatosUsuario(84).then((datos)=>{
//   console.log(datos)
// })