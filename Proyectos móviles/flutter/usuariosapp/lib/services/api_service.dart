// ignore: depend_on_referenced_packages

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:intl/intl.dart';
import 'package:usuariosapp/utils/utils.dart';
import 'dart:convert';

import '../domain/usuario.dart';

class UsuarioService {
  static const String baseUrl = 'http://$ip:3000/api';

  Future<List<Usuario>> obtenerUsuarios() async {
    List<Usuario> usuariosData = [];
    try {
      final response = await http.get(Uri.parse('$baseUrl/obtenerUsuarios'));
      final jsonData = jsonDecode(response.body);

      if (jsonData is List && jsonData.isNotEmpty) {
        final usuarioJsonList = jsonData[0]; // Access the first element

        usuariosData = usuarioJsonList.map<Usuario>((usuarioJson) {
          return Usuario(
            usuarioid: int.parse(usuarioJson['usuarioid'].toString()),
            usuarionombre: usuarioJson['usuarionombre'],
            usuariocorreo: usuarioJson['usuariocorreo'],
            usuariopassword: usuarioJson['usuariopassword'],
            usuariotipo: usuarioJson['usuariotipo'],
            usuariofecharegistro:
                DateTime.parse(usuarioJson['usuariofecharegistro']),
            usuarioestado: int.parse(usuarioJson['usuarioestado'].toString()),
          );
        }).toList();
      }
    } catch (e) {
      print(e);
    }

    return usuariosData;
  }

  Future<void> ingresarUsuario(BuildContext context, Usuario u) async {
    final dateFormat = DateFormat("yyyy-MM-dd");
    final data = {
      'usuarionombre': u.usuarionombre,
      'usuariocorreo': u.usuariocorreo,
      'usuariopassword': u.usuariopassword,
      'usuariotipo': u.usuariotipo,
      'usuariofecharegistro': dateFormat.format(u.usuariofecharegistro),
      'usuarioestado': u.usuarioestado,
    };

    print(json.encode(data));
    try {
      var res = await http.post(
        Uri.parse('$baseUrl/ingresarUsuario'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode(data),
      );

      var resultado = jsonDecode(res.body);

      print(resultado);

      if (resultado['statusCode'] == 200) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Agregado con éxito'),
          ),
        );
      } else {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Error al agregar'),
          ),
        );
      }
    } catch (error) {
      print('Error: $error');
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(
          content: Text('Error al realizar la solicitud'),
        ),
      );
    }
  }

  Future<void> actualizarUsuario(BuildContext context, Usuario u) async {
    final dateFormat = DateFormat("yyyy-MM-dd");
    try {
      final data = {
        'usuarioid': u.usuarioid,
        'usuarionombre': u.usuarionombre,
        'usuariocorreo': u.usuariocorreo,
        'usuariopassword': u.usuariopassword,
        'usuariotipo': u.usuariotipo,
        'usuariofecharegistro': dateFormat.format(u.usuariofecharegistro),
        'usuarioestado': u.usuarioestado.toString(),
      };

      var res = await http.put(
        Uri.parse('$baseUrl/actualizarUsuario'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode(data),
      );

      var resultado = jsonDecode(res.body);
      if (resultado['statusCode'] == 200) {
        //Para utilizar se necesita un contexto
        // ignore: use_build_context_synchronously
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Actualizado con éxito'),
          ),
        ); //Similar a Toast
      } else {
        // ignore: use_build_context_synchronously
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Error al actualizar'),
          ),
        );
      }
    } catch (e) {
      print(e);
    }
  }

  Future<void> eliminarUsuario(BuildContext context, int id) async {
    try {
      print('$baseUrl/eliminarUsuario/$id');
      var response = await http.delete(
          Uri.parse('$baseUrl/eliminarUsuario/$id'));

      var resultado = jsonDecode(response.body);

      if (resultado['statusCode'] == 200) {
        // ignore: use_build_context_synchronously
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text(resultado['message']),
          ),
        );
      } else {
        // ignore: use_build_context_synchronously
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('Error al eliminar'),
          ),
        );
      }
    } catch (e) {
      print(e);
    }
  }
}
