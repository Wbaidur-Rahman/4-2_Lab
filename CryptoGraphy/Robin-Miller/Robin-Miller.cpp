#include<bits/stdc++.h>
#define ll long long

using namespace std;

ll bigmod(ll n, ll r, ll m){
    if(r==0) return 1;
    if(r==1) return n%m;

    ll x;
    if(r%2) x = bigmod(n, r-1, m)*n;
    else{
        x = bigmod(n, r/(ll)2, m);
        x = x*x;
    }

    return x%m;
}

bool isPrime(ll p, int t){
    if(p==2 || p==3) return true;
    if(p<=1 || p%2==0) return false;

    ll a,z,j=0,b=0,m=0;

    a = p-1;
    while(a%2 == 0){
        b++;
        a /= 2;
    }
    m = a;

    cout << m << " " << b << endl;

    for(int i=0;i<t;i++){

        a = 1 + rand()%(p-1);
        z = bigmod(a, m, p);

        if(z==1 || z==p-1) continue; 
        j=0;
        while(j<b && z != 1 && z != p-1){
            j++;
            z = (z*z) %p;
        }
        if(z != p-1) return false;
    }
    return true;
}

int main(){
    ll p;

    cin >> p;
    if(isPrime(p, 100)){
        puts("Prime");
    } else {
        puts("Not prime");
    }
}