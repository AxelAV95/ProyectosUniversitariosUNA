package una.acr.usuariosapp.network

import android.content.Context
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.toolbox.Volley

class VolleySingleton private constructor(context: Context) {

    private var requestQueue: RequestQueue

    init {
        requestQueue = getRequestQueue(context.applicationContext)
    }

    private fun getRequestQueue(context: Context): RequestQueue {
        if (requestQueue == null) {
            requestQueue = Volley.newRequestQueue(context.applicationContext)
        }
        return requestQueue
    }

    companion object {
        @Volatile
        private var INSTANCE: VolleySingleton? = null

        fun getInstance(context: Context): VolleySingleton =
            INSTANCE ?: synchronized(this) {
                INSTANCE ?: VolleySingleton(context).also { INSTANCE = it }
            }
    }

    fun <T> addToRequestQueue(request: Request<T>) {
        getRequestQueue().add(request)
    }

    private fun getRequestQueue(): RequestQueue {
        return requestQueue
    }
}