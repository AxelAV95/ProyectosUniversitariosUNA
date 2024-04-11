const express = require('express');
const bodyParser = require('body-parser');
const UsuarioBusiness = require('./business/usuariobusiness');
const Usuario = require('./domain/usuario');
const usuarioService = require('./services/usuarioservice');


const port = 3000; // Puerto en el que se ejecutará el servidor

const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use((req, res, next) => {
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
  next();
});

app.use('/api', usuarioService);


// app.get('/api/obtenerUsuarios', (req, res) => {
//     const usuarioBusiness = new UsuarioBusiness();
//     usuarioBusiness.obtenerUsuarios().then((usuarios)=>{
//         if(usuarios.length > 0){
//             res.json(usuarios);
//         }else{
//             res.json({ statusCode: 400, message: 'No se encontraron usuarios' })
//         }
//     })
// });

// app.get('/api/obtenerDatosUsuario/:id', (req, res)=>{
//     const id = parseInt(req.params.id);    
//     if (!isNaN(id)) {
//       const usuarioBusiness = new UsuarioBusiness();
//       usuarioBusiness
//         .obtenerDatosUsuario(id)
//         .then((datos) => {
//            if(datos.length > 0){
//                 res.json(datos)
//            }else{
//                 res.json({ statusCode: 400, message: 'Error al obtener datos del usuario' });
//            }
//         })
//         .catch((error) => {
//           res.json({ statusCode: 400, message: 'Error al obtener datos del usuario' });
//         });
//     } else {
//       res.json({ statusCode: 400, message: 'ID de usuario inválido' });
//     }

   
// });


// app.post('/api/ingresarUsuario', (req, res) => { 
//     const data = req.body;
// 		console.log(data);
//     if (data.usuarionombre && data.usuariocorreo && data.usuariopassword && data.usuariotipo && data.usuariofecharegistro && data.usuarioestado) {
//         const usuario = new Usuario(
//             0,
//             data.usuarionombre,
//             data.usuariocorreo,
//             data.usuariopassword,
//             data.usuariotipo,
//             data.usuariofecharegistro,
//             data.usuarioestado
//           );

//           const usuarioBusiness = new UsuarioBusiness();
//           usuarioBusiness.insertarUsuario(usuario).then((resultado)=>{
//             if(resultado !== null){
//                 res.json({ statusCode: 200, message: 'Insertado con éxito' });
//             }else{
//                 res.json({ statusCode: 400, message: 'Error al insertar el usuario' });
//             }
//           })
//           .catch((error) => {
//             res.json({ statusCode: 400, message: 'Error al insertar el usuario' });
//           });
//     } else {
//         res.json({ statusCode: 400, message: 'Faltan parámetros requeridos para insertar el usuario' });
//       }

// });

// app.put('/api/actualizarUsuario', (req, res)=>{
//     const data = req.body;

//     if (data.usuarioid && data.usuarionombre && data.usuariocorreo && data.usuariopassword && data.usuariotipo && data.usuariofecharegistro && data.usuarioestado) {
//         const usuario = new Usuario(
//             data.usuarioid,
//             data.usuarionombre,
//             data.usuariocorreo,
//             data.usuariopassword,
//             data.usuariotipo,
//             data.usuariofecharegistro,
//             data.usuarioestado
//           );
// 		console.log(usuario);
//           const usuarioBusiness = new UsuarioBusiness();
//           usuarioBusiness.modificarUsuario(usuario).then((resultado)=>{
//             if(resultado !== null){
//                 res.json({ statusCode: 200, message: 'Actualizado con éxito' });
//             }else{
//                 res.json({ statusCode: 400, message: 'Error al actualizar el usuario' });
//             }
//           })
//           .catch((error) => {
//             res.json({ statusCode: 400, message: 'Error al actualizar el usuario' });
//           });
//     }
// });

// app.delete('/api/eliminarUsuario/:id', (req, res) => {
//     const id = parseInt(req.params.id);
//     if (!isNaN(id)) {
//       const usuarioBusiness = new UsuarioBusiness();
//       usuarioBusiness
//         .eliminarUsuario(id)
//         .then((resultado) => {
//           if (resultado) {
//             res.json({ statusCode: 200, message: 'Eliminado con éxito' });
//           } else {
//             res.json({ statusCode: 400, message: 'Error al eliminar el usuario' });
//           }
//         })
//         .catch((error) => {
//           res.json({ statusCode: 400, message: 'Error al eliminar el usuario' });
//         });
//     } else {
//       res.json({ statusCode: 400, message: 'ID de usuario inválido' });
//     }
//   });
  


app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});
