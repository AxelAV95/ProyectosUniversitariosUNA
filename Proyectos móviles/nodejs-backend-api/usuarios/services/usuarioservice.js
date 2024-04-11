const express = require('express');
const UsuarioBusiness = require('../business/usuariobusiness');
const Usuario = require('../domain/usuario');

const router = express.Router();
const usuarioBusiness = new UsuarioBusiness();

router.get('/obtenerUsuarios', (req, res) => {
    usuarioBusiness.obtenerUsuarios().then((usuarios)=>{
        if(usuarios.length > 0){
            res.json(usuarios);
        } else {
            res.json({ statusCode: 400, message: 'No se encontraron usuarios' })
        }
    });
});

router.get('/obtenerDatosUsuario/:id', (req, res) => {
    const id = parseInt(req.params.id);
    if (!isNaN(id)) {
        usuarioBusiness.obtenerDatosUsuario(id)
            .then((datos) => {
                if (datos.length > 0) {
                    res.json(datos)
                } else {
                    res.json({ statusCode: 400, message: 'Error al obtener datos del usuario' });
                }
            })
            .catch((error) => {
                res.json({ statusCode: 400, message: 'Error al obtener datos del usuario' });
            });
    } else {
        res.json({ statusCode: 400, message: 'ID de usuario inválido' });
    }
});

router.post('/ingresarUsuario', (req, res) => {
    const data = req.body;
    console.log(data);
    if (data.usuarionombre && data.usuariocorreo && data.usuariopassword && data.usuariotipo && data.usuariofecharegistro && data.usuarioestado) {
        const usuario = new Usuario(
            0,
            data.usuarionombre,
            data.usuariocorreo,
            data.usuariopassword,
            data.usuariotipo,
            data.usuariofecharegistro,
            data.usuarioestado
        );

        usuarioBusiness.insertarUsuario(usuario)
            .then((resultado) => {
                if (resultado !== null) {
                    res.json({ statusCode: 200, message: 'Insertado con éxito' });
                } else {
                    res.json({ statusCode: 400, message: 'Error al insertar el usuario' });
                }
            })
            .catch((error) => {
                res.json({ statusCode: 400, message: 'Error al insertar el usuario' });
            });
    } else {
        res.json({ statusCode: 400, message: 'Faltan parámetros requeridos para insertar el usuario' });
    }
});

router.put('/actualizarUsuario', (req, res) => {
    const data = req.body;

    if (data.usuarioid && data.usuarionombre && data.usuariocorreo && data.usuariopassword && data.usuariotipo && data.usuariofecharegistro && data.usuarioestado) {
        const usuario = new Usuario(
            data.usuarioid,
            data.usuarionombre,
            data.usuariocorreo,
            data.usuariopassword,
            data.usuariotipo,
            data.usuariofecharegistro,
            data.usuarioestado
        );
        console.log(usuario);
        usuarioBusiness.modificarUsuario(usuario)
            .then((resultado) => {
                if (resultado !== null) {
                    res.json({ statusCode: 200, message: 'Actualizado con éxito' });
                } else {
                    res.json({ statusCode: 400, message: 'Error al actualizar el usuario' });
                }
            })
            .catch((error) => {
                res.json({ statusCode: 400, message: 'Error al actualizar el usuario' });
            });
    }
});

router.delete('/eliminarUsuario/:id', (req, res) => {
    const id = parseInt(req.params.id);
    if (!isNaN(id)) {
        usuarioBusiness.eliminarUsuario(id)
            .then((resultado) => {
                if (resultado) {
                    res.json({ statusCode: 200, message: 'Eliminado con éxito' });
                } else {
                    res.json({ statusCode: 400, message: 'Error al eliminar el usuario' });
                }
            })
            .catch((error) => {
                res.json({ statusCode: 400, message: 'Error al eliminar el usuario' });
            });
    } else {
        res.json({ statusCode: 400, message: 'ID de usuario inválido' });
    }
});

module.exports = router;
