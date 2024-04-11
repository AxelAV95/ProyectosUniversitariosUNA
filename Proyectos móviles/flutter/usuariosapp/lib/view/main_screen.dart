import 'package:flutter/material.dart';
import 'package:lottie/lottie.dart';
import 'package:usuariosapp/services/api_service.dart';
import 'package:usuariosapp/view/usuario_modificar_screen.dart';

import '../domain/usuario.dart';

class MainScreen extends StatefulWidget {
  const MainScreen({super.key});

  @override
  State<MainScreen> createState() => MainScreenState();
}

class MyCard extends StatelessWidget {
  final VoidCallback onTap;

  const MyCard({Key? key, required this.onTap}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onTap,
      child: Card(
        elevation: 2.0,
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              SizedBox(
                width: 50.0,
                height: 50.0,
                child: Lottie.asset(
                  'agregar2.json',
                  width: 50.0,
                  height: 50.0,
                  fit: BoxFit.contain,
                  repeat: true,
                  animate: true,
                ),
              ),
              const SizedBox(height: 2.0),
              const Text(
                'Agregar',
                style: TextStyle(
                  color: Color(0xFF183B8D),
                  fontWeight: FontWeight.normal,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class MainScreenState extends State<MainScreen> {
  List<Usuario> listaUsuarios = [];

  void _navigateToAddUsuario() async {
    final result = await Navigator.pushNamed(context, '/Agregar');
    if (result == true) {
      // Refresh the list
      usuarioService.obtenerUsuarios().then((data) {
        setState(() {
          listaUsuarios = data;
        });
      });
    }
  }

  UsuarioService usuarioService = UsuarioService();

  @override
  void initState() {
    super.initState();
    usuarioService.obtenerUsuarios().then((data) {
      setState(() {
        listaUsuarios = data;
        print(listaUsuarios.length);
      });
    });
  }

  String convertirFecha(String fecha) {
  DateTime fechaOriginal = DateTime.parse(fecha);
  String dia = fechaOriginal.day.toString().padLeft(2, '0'); // Obtiene el día (DD)
  String mes = fechaOriginal.month.toString().padLeft(2, '0'); // Obtiene el mes (MM)
  String anio = fechaOriginal.year.toString(); // Obtiene el año (AAAA)

  return '$dia-$mes-$anio'; // Concatena las partes en el nuevo formato: DD-MM-AAAA
}



  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Column(
        children: [
          Container(
            height: 50.0,
            margin: const EdgeInsets.only(bottom: 8.0),
            decoration: const BoxDecoration(
              gradient: LinearGradient(
                colors: [
                  Color(0xFF023AA4),
                  Color(0xFF0F73C8),
                  Color(0xFF1498E1),
                ],
                begin: Alignment.topCenter,
                end: Alignment.bottomCenter,
              ),
            ),
            child: const Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Text(
                  'Usuarios - Flutter',
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 20.0,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ],
            ),
          ),
          MyCard(
            onTap: _navigateToAddUsuario,
          ),
          Expanded(
            child: ListView.builder(
              itemCount: listaUsuarios.length,
              itemBuilder: (context, index) {
                return Card(
                  margin: const EdgeInsets.all(10),
                  child: InkWell(
                    onTap: () {
                      // Handle onTap event
                    },
                    child: ListTile(
                      title: Text(listaUsuarios[index].usuarionombre),
                      subtitle: Text(listaUsuarios[index].usuariocorreo),
                      trailing: Row(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          GestureDetector(
                            onTap: () {
                              showDialog(
                                context: context,
                                builder: (BuildContext context) {
                                
                                  return AlertDialog(
                                    title: Text('Información del usuario'),
                                    content: Column(
                                      crossAxisAlignment:
                                          CrossAxisAlignment.start,
                                      mainAxisSize: MainAxisSize.min,
                                      children: [
                                        Text(
                                            'Nombre: ${listaUsuarios[index].usuarionombre}'),
                                        Text(
                                            'Correo: ${listaUsuarios[index].usuariocorreo}'),
                                        Text(
                                            'Tipo de usuario: ${listaUsuarios[index].usuariotipo}'),
                                        Text(
        'Fecha de registro: ${convertirFecha(listaUsuarios[index].usuariofecharegistro.toString())}',
),

                                        // Add more user information fields as needed
                                          Text('Estado: ${listaUsuarios[index].usuarioestado == 1 ? 'Activo' : 'Inactivo'}'),
                                      ],
                                    ),
                                    actions: [
                                      TextButton(
                                        onPressed: () {
                                          Navigator.pop(context);
                                        },
                                        child: Text('Close'),
                                      ),
                                    ],
                                  );
                                },
                              );
                            },
                            child: SizedBox(
                              width: 34,
                              height: 34,
                              child: Lottie.asset(
                                'ver.json',
                                width: 24,
                                height: 24,
                                fit: BoxFit.contain,
                                repeat: true,
                                animate: true,
                              ),
                            ),
                          ),
                          const SizedBox(width: 16),
                          GestureDetector(
                            onTap: () async {
                              final result = await Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => UsuarioModificarScreen(
                                    usuario: listaUsuarios[index],
                                  ),
                                ),
                              );
                              if (result == true) {
                                // Refresh the list
                                usuarioService.obtenerUsuarios().then((data) {
                                  setState(() {
                                    listaUsuarios = data;
                                  });
                                });
                              }
                            },
                            child: SizedBox(
                              width: 34,
                              height: 34,
                              child: Lottie.asset(
                                'editar.json',
                                width: 24,
                                height: 24,
                                fit: BoxFit.contain,
                                repeat: true,
                                animate: true,
                              ),
                            ),
                          ),
                          const SizedBox(width: 16),
                          GestureDetector(
                            onTap: () async {
                              print(listaUsuarios[index].usuarioid);
                              await usuarioService.eliminarUsuario(
                                  context, listaUsuarios[index].usuarioid);
                              final data =
                                  await usuarioService.obtenerUsuarios();
                              setState(() {
                                listaUsuarios = data;
                              });
                            },
                            child: SizedBox(
                              width: 34,
                              height: 34,
                              child: Lottie.asset(
                                'borrar.json',
                                width: 24,
                                height: 24,
                                fit: BoxFit.contain,
                                repeat: true,
                                animate: true,
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                );
              },
            ),
          ),
        ],
      ),
    );
  }
}
