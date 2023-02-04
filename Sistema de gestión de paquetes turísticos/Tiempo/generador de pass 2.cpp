#include <string>
#include <iostream>
#include <cstdlib>
#include <time.h>

using namespace std;

string RandomString(int len)
{
   srand(time(0));
   string str = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
   int pos;
   while(str.size() != len) {
    pos = ((rand() % (str.size() - 1)));
    str.erase (pos, 1);
   }
   return str;
}

int main()
{
   string random_str = RandomString(10);
   cout << "random_str : " << random_str << endl;
}
