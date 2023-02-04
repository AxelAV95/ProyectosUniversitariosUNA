package com.flyfree.datos;

import static com.flyfree.datos.BaseData.getConexion;
import com.flyfree.dominio.Destinos;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedList;
import javax.swing.JOptionPane;

public class DestinosData extends BaseData {
// variables globales

    private PreparedStatement statement;
    private Connection con;

    //metodo para agregar
    public boolean agregarDestino(Destinos destino) throws SQLException {
        //procedimiento para insertar en la base de datos
        boolean inserto = false;
        con = getConexion();// se obtiene la conexcion
        //String sql = "CALL insertarDestino(0,?,?);";
        String sql =  "INSERT INTO tbdestino VALUES(0,?,?)";

        if (con != null) {// si la coneccion es diferente de vacia
            statement = con.prepareStatement(sql);// prepara la consulta
            statement.setString(1, destino.getDestinonombre());
            statement.setString(2, destino.getDestinoubicacion());
            statement.executeUpdate();// ejecuta la consulta
            statement.close();// cierra la preparacion sql
            con.close();// cierra la conexion
            inserto = true;// devuelve verdadero
        } else {
            JOptionPane.showMessageDialog(null, "Error al insertar");
        }
        return inserto;
    }

    //metodo para modificar
    public boolean modificarDestino(Destinos destino) throws SQLException {
        //procedimiento para modificar en la base de datos
        boolean modifico = false;
        con = getConexion();// se obtiene la conexcion
        String sql = "UPDATE tbdestino SET destinonombre=?,destinoubicacion=? WHERE destinoid = ?";

        if (con != null) {// si la coneccion es diferente de vacia
            statement = con.prepareStatement(sql);// prepara la consulta
            statement.setString(1, destino.getDestinonombre());
            statement.setString(2, destino.getDestinoubicacion());
            statement.setInt(3, destino.getDestinoid());
            statement.executeUpdate();// ejecuta la consulta
            statement.close();// cierra la preparacion sql
            con.close();// cierra la conexion
            modifico = true;// devuelve verdadero
        } else {
            JOptionPane.showMessageDialog(null, "Error al modificar");
        }
        return modifico;
    }

    //metodo para ver
    public LinkedList<Destinos> getDestino() throws SQLException {

        String sql = "CALL  mostrarDestinos()";

        LinkedList<Destinos> listaDestinos = new LinkedList();
        con = getConexion();

        if (con != null) {

            statement = con.prepareStatement(sql);
            try (ResultSet result = statement.executeQuery()) {
                while (result.next()) {
                    Destinos edit = new Destinos(0, "", "");
                    edit.setDestinoid(result.getInt("destinoid"));
                    edit.setDestinonombre(result.getString("destinonombre"));
                    edit.setDestinoubicacion(result.getString("destinoubicacion"));
                    listaDestinos.add(edit);
                }
            }
            statement.close();
            con.close();
        } else {
            JOptionPane.showMessageDialog(null, "No se pudieron recuperar los datos.");
        }
        return listaDestinos;
    }

    //metodo para eliminar
    public boolean eliminarDestino(Destinos destino) throws SQLException {
        //procedimiento para eliminar en la base de datos
        boolean elimino = false;
        con = getConexion();// se obtiene la conexcion
        String sql = "DELETE FROM tbdestino WHERE destinoid= ?";

        if (con != null) {// si la coneccion es diferente de vacia
            statement = con.prepareStatement(sql);// prepara la consulta
            statement.setInt(1, destino.getDestinoid());
            statement.executeUpdate();// ejecuta la consulta
            statement.close();// cierra la preparacion sql
            con.close();// cierra la conexion
            elimino = true;// devuelve verdadero
        } else {
            JOptionPane.showMessageDialog(null, "Error al eliminar");
        }
        return elimino;
    }
}
