# P2SO
Proyecto 2 - Sistemas operativos

Integrantes
- Axel Andrade Villalobos
- Kennia Martínez Camacho
- Heyner Leiva Díaz
- Joshua Álvarez Chavarría

Para correr en Ubuntu
gcc principal.c -o proyecto -pthread -lm
./proyecto

CORRECCIONES Y COMENTARIOS

- Se mejoró la asignación de procesos en el modelo de socios, de tal
forma que cuando se agote la memoria, utilice la virtual y cuando se
finalice un proceso, quede disponible un nodo en el arbol para que
otro proceso lo tome, total 16 procesos permitidos en bloques de 256k en
la profundidad del árbol 4 (2^4), la condicion es por cada proceso
que se asigne, decrementar los bloques libres, por cada proceso
que finalice, incrementar bloques libres. Se logró mayor equilibrio
comparado a su funcionamiento anterior, donde se solo se usaba memoria virtual
una vez agotados los espacios disponibles

- No fue posible realizar un cálculo correcto del desperdicio
externo del modelo socios debido a que daba muchos errores 
al recorrer el árbol, la idea era llevar un control del nodo padre
sobre sus hijos y validar estados entre padre-hijo izquierdo y derecho,
donde la combinaciones:

True-true-true: no fuera posible un calculo de desperdicio externo
True-true-false/true-false-true: no fuera posible un calculo de desperdicio externo
False,false,false: Calculo de desperdicio externo

Por motivos de escaso tiempo y la asignación recurrente 
de trabajos en diferentes cursos este cierre de semana, a este punto de la 
entrega de esta corrección se nos hace imposible reestructurar, plantear y
construir desde cero una solución alternativa para este funcionamiento.
El funcionamiento actual realiza un calculo en sí pero toma en cuanta los nodos padre como desperdicio 
cuando sus hijos están ocupados, lo cual no debe ser permitido ya que solo debe
ser posible si los dos hijos están libres.

- Desperdicio interno calculado correctamente en árbol de socios

- Sleeps del código modificados a 0, para una ejecución mas rápida