import 'package:flutter/material.dart';
import 'package:usuariosapp/view/main_screen.dart';
import 'package:usuariosapp/view/usuario_agregar_screen.dart';

class UsuarioApp extends StatelessWidget {
  const UsuarioApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Examen 2 - Usuarios',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: const Color.fromARGB(255, 58, 183, 150)),
        useMaterial3: true,
      ),
      home: const MainScreen(),
      routes: {
        '/Agregar': (context) => const UsuarioForm(),
        '/Main': (context) => const MainScreen()
        
       // '/Ver': (context) => VerExcursionesPage(),
      },
    );
  }
}