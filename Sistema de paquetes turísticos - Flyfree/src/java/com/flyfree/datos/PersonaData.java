
package com.flyfree.datos;

import static com.flyfree.datos.BaseData.getConexion;
import com.flyfree.dominio.Persona;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedList;
import javax.swing.JOptionPane;


public class PersonaData {
    
      private PreparedStatement statement;
    private Connection con;
    
    
    
    
    
    public boolean agregarPersona(Persona persona) throws SQLException{
    //procedimiento para insertar en la base de datos
        boolean inserto = false;
        String sql = "call insertarPersona(0,?,?,?,?,?,?,?,?);";
        String pass = persona.getPass();
        con = getConexion();
        
        //JOptionPane.showMessageDialog(null, persona.getPassword());
        if (con != null){
            statement = con.prepareStatement(sql);
            
            statement = con.prepareStatement(sql);
            statement.setString(1, persona.getNombre());
            statement.setString(2, persona.getApellido1());
            statement.setString(3, persona.getApellido2());
            statement.setString(4, persona.getEmail());
            statement.setInt(5,persona.getTelefono());
            statement.setString(6, pass);
            statement.setString(7, persona.getGenero());
            statement.setString(8, persona.getPais());
            statement.executeUpdate();
            statement.close();
            con.close();
            inserto = true;
        }else{
            JOptionPane.showMessageDialog(null,"Error al insertar" );
        }
      return inserto;
    }
    
    public boolean actualizarPersona(Persona persona) throws SQLException{
        con = getConexion();
        //JOptionPane.showMessageDialog(null,paquete+"*******");
        String sql = "call actualizarPersona(?,?,?,?,?,?,?,?)";
        boolean insertar = false;   
        if(con != null){
            statement = con.prepareStatement(sql);         
            //statement.setInt(2,paquete.getIdDestino());
            //statement.setInt(3,paquete.getIdServicio());  
          statement.setString(1, persona.getNombre());
            statement.setString(2, persona.getApellido1());
            statement.setString(3, persona.getApellido2());
            statement.setString(4, persona.getEmail());
            statement.setInt(5,persona.getTelefono());
            statement.setString(6, persona.getPassword());
            statement.setString(7, persona.getGenero());
            statement.setString(8, persona.getPais());
           ;
            statement.executeUpdate();
            insertar = true;
        }
        statement.close();        
        con.close();       
        return insertar;
    }
    
    
    public boolean eliminarPersona(String email) throws SQLException{
        boolean elimino = false;
        con = getConexion();
        //JOptionPane.showMessageDialog(null,codigo);
        String sql = "call eliminarPersona(?)";       
        
        ResultSet result;
         
        if(con != null){
            statement = con.prepareStatement(sql);
            statement.setString(1,email);
            elimino=true;
            result =  statement.executeQuery();                    
            result.close();
        }
        statement.close();
        con.close();   
        return elimino;
    }
    
    
    public LinkedList<Persona> BuscarPersona(String correo) throws SQLException{
        LinkedList<Persona>listaPaquete = new LinkedList();
        con = getConexion();
        //JOptionPane.showMessageDialog(null,codigo);
        String sql = "call buscarPersona(?)";       
        Persona persona = new Persona();
        ResultSet result;
         int idPersona;
     String nombre;
     String apellido1;
     String apellido2;
    String email;
    int telefono;
    
    String genero;
    String pais;
    String pass; 
        if(con != null){
            statement = con.prepareStatement(sql);
            statement.setString(1,correo);
            result =  statement.executeQuery();
            
            while (result.next()){      
                                
                idPersona = result.getInt("personaid");
                nombre= result.getString("personanombre");
                apellido1 = result.getString("personaapellido1");
                 apellido2 = result.getString("personaapellido2");
                email = result.getString("personaemail");
                telefono = result.getInt("personatelefono");
                genero = result.getString("personagenero");
                pais= result.getString("personapais");
                pass = result.getString("personapassword");
                               
                persona.setIdPersona(idPersona);
                persona.setNombre(nombre);
                persona.setApellido1(apellido1);
                persona.setApellido2(apellido2);
                persona.setEmail(email);
                persona.setTelefono(telefono);
                persona.setGenero(genero);
                persona.setPais(pais);
                persona.setPass(pass);
                
                //JOptionPane.showMessageDialog(null,paquete+"*******");
                listaPaquete.add(persona);                        
            }                       
            result.close();
        }
        statement.close();
        con.close();   
        return listaPaquete;
    }

    public LinkedList<Persona> mostrarPersonas() throws SQLException{
        String sql = "call mostrarPersonas";
        LinkedList<Persona> listaPersonas = new LinkedList();
        con = getConexion();
        ResultSet result;
        
            int idPersona;
     String nombre;
     String apellido1;
     String apellido2;
    String email;
    int telefono;
    
    String genero;
    String pais;
    String pass; 
         
        if(con != null){
            statement = con.prepareStatement(sql);
            result =  statement.executeQuery();  
            while (result.next()){      
                Persona persona = new Persona();
                 idPersona = result.getInt("personaid");
                nombre= result.getString("personanombre");
                apellido1 = result.getString("personaapellido1");
                 apellido2 = result.getString("personaapellido2");
                email = result.getString("personaemail");
                telefono = result.getInt("personatelefono");
                genero = result.getString("personagenero");
                pais= result.getString("personapais");
                pass = result.getString("personapassword");
                               
                persona.setIdPersona(idPersona);
                persona.setNombre(nombre);
                persona.setApellido1(apellido1);
                persona.setApellido2(apellido2);
                persona.setEmail(email);
                persona.setTelefono(telefono);
                persona.setGenero(genero);
                persona.setPais(pais);
                persona.setPass(pass);
                listaPersonas.add(persona);                            
            }            
           
            result.close();
        }
             
        //JOptionPane.showMessageDialog(null,listaPaquetes);
         return listaPersonas;
    }
}



