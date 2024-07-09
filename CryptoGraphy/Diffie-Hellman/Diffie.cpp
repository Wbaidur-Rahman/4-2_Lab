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

int main(){
    ll prime = 97;
    ll primitive_root = 27;

    ll apk = 18; // alice private key
    ll bpk = 21; // bobs private key

    ll ya = bigmod(primitive_root, apk, prime);
    ll yb = bigmod(primitive_root, bpk, prime);

    ll ka = bigmod(yb, apk, prime);
    ll kb = bigmod(ya, bpk, prime);

    cout << "Alices key : " << ka << endl;
    cout << "Bobs key : " << kb << endl;

    return 0;
}