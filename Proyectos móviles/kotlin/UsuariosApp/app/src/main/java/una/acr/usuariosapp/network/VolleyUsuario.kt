package una.acr.usuariosapp.network

import android.app.Activity
import android.content.Context
import android.content.Intent
import android.util.Log
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonArrayRequest
import com.android.volley.toolbox.JsonObjectRequest
import org.json.JSONException
import org.json.JSONObject
import una.ac.cr.usuariosapp.domain.Usuario
import una.acr.usuariosapp.views.interfaces.UsuarioDeleteCallback
import una.acr.usuariosapp.views.interfaces.UsuarioICallback
import java.text.SimpleDateFormat

class VolleyUsuario {
    private var listaUsuarios: ArrayList<Usuario> = ArrayList()

    // Obtener usuarios
    fun obtenerUsuarios(context: Context, IP: String, callback: UsuarioICallback) {
        listaUsuarios.clear()

        val jsonArrayRequest = JsonArrayRequest(
            Request.Method.GET,
            NetworkUtils.HTTP + NetworkUtils.IP + NetworkUtils.PUERTO + NetworkUtils.ENDPOINT_OBTENER,
            null,
            Response.Listener { response ->
                try {
                    val jsonArray = response.getJSONArray(0)

                    Log.e("usanyText", jsonArray.length().toString())
                    for (i in 0 until jsonArray.length()) {
                        val jsonObject = jsonArray.getJSONObject(i)
                        val fechaOriginal = jsonObject.getString("usuariofecharegistro")


                        val formatoOriginal = SimpleDateFormat("yyyy-MM-dd")
                        val formatoNuevo = SimpleDateFormat("dd-MM-yyyy")
                        val fecha = formatoOriginal.parse(fechaOriginal)
                        val fechaFormateada = formatoNuevo.format(fecha)

                        // Datos del usuario
                        val usuarioId = jsonObject.getInt("usuarioid")
                        val usuarioNombre = jsonObject.getString("usuarionombre")
                        val usuariocorreo = jsonObject.getString("usuariocorreo")
                        val usuarioPassword = jsonObject.getString("usuariopassword")
                        val usuarioTipo = jsonObject.getString("usuariotipo")
                        val usuarioFechaRegistro = fechaFormateada
                        val usuarioestado = jsonObject.getInt("usuarioestado")
                        listaUsuarios.add(
                            Usuario(
                                usuarioId,
                                usuarioNombre,
                                usuariocorreo,
                                usuarioPassword,
                                usuarioTipo,
                                usuarioFechaRegistro,
                                usuarioestado
                            )
                        )
                    }
                } catch (e: JSONException) {
                    e.printStackTrace()
                }
                Log.e("usanyText", listaUsuarios.size.toString())
                callback.onUsuarioReceived(listaUsuarios)
            },
            Response.ErrorListener { error ->
                Log.e("anyText", error.toString())
                /*  Toasty.error(
                      context,
                      error.toString(),
                      Toast.LENGTH_LONG,
                      true
                  ).show()
                  Toasty.error(context, "Error al obtener los datos.", Toast.LENGTH_SHORT, true).show()*/
            })

        VolleySingleton.getInstance(context).addToRequestQueue(jsonArrayRequest)
    }

    fun insertarUsuario(context: Context, usuario: Usuario, IP: String) {
        val usuarioJson = JSONObject()


        val fechaOriginal = usuario.getFechaValue()
        val formatoOriginal = SimpleDateFormat("dd-MM-yyyy")
        val formatoNuevo = SimpleDateFormat("yyyy-MM-dd")
        val fecha = formatoOriginal.parse(fechaOriginal)


        val fechaFormateada = formatoNuevo.format(fecha)
        try {

            usuarioJson.put("usuarionombre", usuario.getNombreValue().toString())
            usuarioJson.put("usuariocorreo", usuario.getCorreoValue())
            usuarioJson.put("usuariopassword", usuario.getPasswordValue())
            usuarioJson.put("usuariotipo", usuario.getTipoUsuarioValue())
            usuarioJson.put("usuariofecharegistro", fechaFormateada)
            Log.e("FECHA", fechaFormateada)
            usuarioJson.put("usuarioestado", usuario.getEstadoValue())
        } catch (e: JSONException) {
            throw RuntimeException(e)
        }

        val jsonObjectRequest = JsonObjectRequest(Request.Method.POST, NetworkUtils.HTTP + NetworkUtils.IP + NetworkUtils.PUERTO + NetworkUtils.ENDPOINT_INSERTAR, usuarioJson,
            Response.Listener { response ->

                if (response.optString("statusCode").toString() == "200") {

                    val returnIntent = Intent()
                    (context as Activity).setResult(Activity.RESULT_OK, returnIntent)
                    context.finish()
                } else {
                    //Toasty.error(context, "Error al insertar", Toast.LENGTH_SHORT, true).show()
                }
            },
            Response.ErrorListener { error ->
                Log.e("anyText", error.toString())
                //Toasty.error(context, "Error al insertar", Toast.LENGTH_SHORT, true).show()
            })

        VolleySingleton.getInstance(context).addToRequestQueue(jsonObjectRequest)
    }

    fun actualizarUsuario(context: Context, usuario: Usuario, IP: String) {
        val usuarioJson = JSONObject()

        val fechaOriginal = usuario.getFechaValue()
        val formatoOriginal = SimpleDateFormat("dd-MM-yyyy")
        val formatoNuevo = SimpleDateFormat("yyyy-MM-dd")
        val fecha = formatoOriginal.parse(fechaOriginal)
        val fechaFormateada = formatoNuevo.format(fecha)

        try {
            usuarioJson.put("usuarioid", usuario.getIdValue())
            usuarioJson.put("usuarionombre", usuario.getNombreValue())
            usuarioJson.put("usuariocorreo", usuario.getCorreoValue())
            usuarioJson.put("usuariopassword", usuario.getPasswordValue())
            usuarioJson.put("usuariotipo", usuario.getTipoUsuarioValue())
            usuarioJson.put("usuariofecharegistro", fechaFormateada)
            usuarioJson.put("usuarioestado", usuario.getEstadoValue().toString())
        } catch (e: JSONException) {
            throw RuntimeException(e)
        }
        Log.e("USERACT", usuarioJson.toString())
        val jsonObjectRequest = JsonObjectRequest(
            Request.Method.PUT,NetworkUtils.HTTP + NetworkUtils.IP + NetworkUtils.PUERTO + NetworkUtils.ENDPOINT_MODIFICAR,
            usuarioJson,
            Response.Listener { response ->
                if (response.optString("statusCode").toString() == "200") {
                    val returnIntent = Intent()
                    (context as Activity).setResult(200, returnIntent)
                    context.finish()
                } else {
                    val returnIntent = Intent()
                    (context as Activity).setResult(400, returnIntent)
                    context.finish()
                }
            },
            Response.ErrorListener { error ->
                Log.e("anyText", error.toString())
                //Toasty.error(context, "Error al actualizar", Toast.LENGTH_SHORT, true).show()
            }
        )

        VolleySingleton.getInstance(context).addToRequestQueue(jsonObjectRequest)
    }

    fun eliminarUsuario(context: Context, usuario: Usuario, IP: String, callback: UsuarioDeleteCallback) {
        Log.e("RUTA", NetworkUtils.HTTP + NetworkUtils.IP + NetworkUtils.PUERTO + NetworkUtils.ENDPOINT_ELIMINAR+usuario.getIdValue())
        val jsonObjectRequest = JsonObjectRequest(
            Request.Method.DELETE,
            NetworkUtils.HTTP + NetworkUtils.IP + NetworkUtils.PUERTO + NetworkUtils.ENDPOINT_ELIMINAR+usuario.getIdValue(),
            null,
            Response.Listener { response ->
                if (response.optString("statusCode").toString() == "200") {

                    Toast.makeText(context, "Eliminado con éxito", Toast.LENGTH_LONG).show()
                    callback.onUsuarioDeleted()

                } else {
                    Toast.makeText(context, "Error al eliminar", Toast.LENGTH_LONG).show()
                }
            },
            Response.ErrorListener { error ->
                Log.e("anyText", error.toString())
                Toast.makeText(context, "Error al eliminar", Toast.LENGTH_LONG).show()
            }
        )

        VolleySingleton.getInstance(context).addToRequestQueue(jsonObjectRequest)
    }



}