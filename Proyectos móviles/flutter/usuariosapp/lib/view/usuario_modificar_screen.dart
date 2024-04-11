import 'package:flutter/material.dart';
import 'package:usuariosapp/domain/usuario.dart';
import 'package:usuariosapp/view/widgets/custom_button.dart';

import '../services/api_service.dart';

class UsuarioModificarScreen extends StatefulWidget {
  final Usuario usuario;

  const UsuarioModificarScreen({Key? key, required this.usuario})
      : super(key: key);

  @override
  // ignore: library_private_types_in_public_api
  _UsuarioModificarScreenState createState() => _UsuarioModificarScreenState();
}

class _UsuarioModificarScreenState extends State<UsuarioModificarScreen> {
   final _formKey = GlobalKey<FormState>();
  late TextEditingController _nombreController;
  late TextEditingController _correoController;
  late TextEditingController _passwordController;
  late String _selectedTipo;
  late DateTime _fechaRegistro;
  late String _selectedEstado;

  @override
  void initState() {
    super.initState();
    _nombreController =
        TextEditingController(text: widget.usuario.usuarionombre);
    _correoController =
        TextEditingController(text: widget.usuario.usuariocorreo);
    _passwordController =
        TextEditingController(text: widget.usuario.usuariopassword);

    _selectedTipo = widget.usuario.usuariotipo;
    _fechaRegistro = widget.usuario.usuariofecharegistro;
  //  print(widget.usuario.usuarioestado);
    var estado = '';
    if (widget.usuario.usuarioestado == 1) {
      estado = 'Activo';
    } else {
      estado = 'Inactivo';
    }
    _selectedEstado = estado;
  }

  @override
  void dispose() {
    _nombreController.dispose();
    _correoController.dispose();
    _passwordController.dispose();
    super.dispose();
  }

  Future<void> _submitForm() async {
    if (_formKey.currentState!.validate()) {
    // Retrieve the updated values from the form fields
    final String nombre = _nombreController.text;
    final String correo = _correoController.text;
    final String password = _passwordController.text;

    int estado = 0;
    if (_selectedEstado == "Activo") {
      estado = 1;
    }else{
      estado = 0;
    }
    print(estado);
    Usuario usuario = Usuario(
        usuarioid: widget.usuario.usuarioid,
        usuarionombre: nombre,
        usuariocorreo: correo,
        usuariopassword: password,
        usuariotipo: _selectedTipo,
        usuariofecharegistro: _fechaRegistro,
        usuarioestado: estado);

    UsuarioService usuarioService = UsuarioService();
    await usuarioService.actualizarUsuario(context, usuario);

    // Navigate back to the previous screen
    // ignore: use_build_context_synchronously
    Navigator.pop(context, true);
    }
  }

  void _selectFechaRegistro(BuildContext context) async {
    final DateTime? pickedDate = await showDatePicker(
      context: context,
      initialDate: _fechaRegistro,
      firstDate: DateTime(1900),
      lastDate: DateTime.now(),
    );

    if (pickedDate != null && pickedDate != _fechaRegistro) {
      setState(() {
        _fechaRegistro = pickedDate;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Modificar Usuario'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Form(
           key: _formKey,
           child: Column(
          children: [
            TextFormField(
              controller: _nombreController,
              decoration: InputDecoration(
                hintText: 'Nombre',
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(8),
                  borderSide: const BorderSide(
                    width: 2,
                    color: Color(0xFFdde1e5),
                  ),
                ),
                contentPadding: const EdgeInsets.all(8),
              ),
              style: const TextStyle(fontSize: 15),
              keyboardType: TextInputType.text,
              validator: (value) {
                if (value!.isEmpty) {
                  return 'Por favor, ingresa un nombre';
                }
                
                final RegExp regex = RegExp(r'^[a-zA-Z\s]+$');
                  if (!regex.hasMatch(value)) {
                    return 'El nombre solo debe contener letras y espacios';
                  }
                return null;
              },
            ),
            const SizedBox(height: 16),
            TextFormField(
              controller: _correoController,
              decoration: InputDecoration(
                hintText: 'Correo electrónico',
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(8),
                  borderSide: const BorderSide(
                    width: 2,
                    color: Color(0xFFdde1e5),
                  ),
                ),
                contentPadding: const EdgeInsets.all(8),
              ),
              style: const TextStyle(fontSize: 15),
              keyboardType: TextInputType.emailAddress,
              validator: (value) {
                if (value!.isEmpty) {
                  return 'Por favor, ingresa un correo electrónico';
                }
                 String pattern =
                    r'^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,7}$';
                RegExp regExp = RegExp(pattern);
                if (!regExp.hasMatch(value)) {
                  return 'Por favor, ingresa un correo electrónico válido';
                }
                return null;
              },
            ),
            const SizedBox(height: 16),
            TextFormField(
              controller: _passwordController,
              decoration: InputDecoration(
                hintText: 'Contraseña',
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(8),
                  borderSide: const BorderSide(
                    width: 2,
                    color: Color(0xFFdde1e5),
                  ),
                ),
                contentPadding: const EdgeInsets.all(8),
              ),
              style: const TextStyle(fontSize: 15),
              keyboardType: TextInputType.text,
              obscureText: true,
              validator: (value) {
                if (value!.isEmpty) {
                  return 'Por favor, ingresa una contraseña';
                }
                return null;
              },
            ),
            const SizedBox(height: 16),
            DropdownButtonFormField<String>(
              value: _selectedTipo,
              decoration: InputDecoration(
                hintText: 'Tipo',
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(8),
                  borderSide: const BorderSide(
                    width: 2,
                    color: Color(0xFFdde1e5),
                  ),
                ),
                contentPadding: const EdgeInsets.all(8),
              ),
              style: const TextStyle(fontSize: 15),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Por favor, selecciona un tipo';
                }
                return null;
              },
              items: ['Administrador', 'Empleado']
                  .map((String value) => DropdownMenuItem<String>(
                        value: value,
                        child: Text(value),
                      ))
                  .toList(),
              onChanged: (value) {
                setState(() {
                  _selectedTipo = value as String;
                });
              },
            ),
            const SizedBox(height: 16),
            GestureDetector(
              onTap: () => _selectFechaRegistro(context),
              child: AbsorbPointer(
                child: TextFormField(
                  controller: TextEditingController(
                      text: _fechaRegistro.toString().split(' ')[0]),
                  decoration: InputDecoration(
                    hintText: 'Fecha de registro',
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(8),
                      borderSide: const BorderSide(
                        width: 2,
                        color: Color(0xFFdde1e5),
                      ),
                    ),
                    contentPadding: const EdgeInsets.all(8),
                  ),
                  style: const TextStyle(fontSize: 15),
                  keyboardType: TextInputType.datetime,
                  validator: (value) {
                    if (value!.isEmpty) {
                      return 'Por favor, ingresa una fecha de registro';
                    }
                    return null;
                  },
                ),
              ),
            ),
            const SizedBox(height: 16),
            DropdownButtonFormField<String>(
              value: _selectedEstado,
              decoration: InputDecoration(
                hintText: 'Estado',
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(8),
                  borderSide: const BorderSide(
                    width: 2,
                    color: Color(0xFFdde1e5),
                  ),
                ),
                contentPadding: const EdgeInsets.all(8),
              ),
              style: const TextStyle(fontSize: 15),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Por favor, selecciona un estado';
                }
                return null;
              },
              items: ['Activo', 'Inactivo']
                  .map((String value) => DropdownMenuItem<String>(
                        value: value,
                        child: Text(value),
                      ))
                  .toList(),
              onChanged: (value) {
                setState(() {
                  _selectedEstado = value as String;
                });
              },
            ),
            const SizedBox(height: 16),
            Column(
              children: [
                // Resto del código...

                const SizedBox(height: 16),
                CustomButton(
                  onPressed:
                      _submitForm, // Asigna la función _submitForm al onPressed del CustomButton
                  text:
                      'Enviar', // Asigna el texto 'Enviar' al text del CustomButton
                ),
              ],
            ),
          ],
        ),
        ),
        
      ),
    );
  }
}
