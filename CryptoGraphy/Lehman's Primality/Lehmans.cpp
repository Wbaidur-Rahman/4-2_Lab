#include<bits/stdc++.h>
#define ll long long

using namespace std;

ll bigmod(ll p, ll r, ll m){
    if(r==0) return 1;
    if(r==1) return p%m;

    ll x;
    if(r%2) x = bigmod(p, r-1, m)*p;
    else{
        x = bigmod(p, r/2, m);
        x = x*x; 
    }

    return x%m;
}

bool isPrime(ll p, int t){
    if(p==2 || p==3) return true;
    if(p <= 1 || p%2==0) return false;

    for(int i=0;i<t;i++){
        ll a = 2 + rand()%(p-2);
        ll x = bigmod(a, p-1, p);

        if(x != 1 && x != -1 && x != p-1) return false;
    } 

    return true;
}

int main(){
    ll p;
    cin >> p;

    if(isPrime(p, 5)){
        puts("May be prime");
    }else{
        puts("Not prime");
    }
}