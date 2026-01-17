# TensIO
Analyseur de tension dans les sujets de dissertations

## Analyse conceptuelle
Décomposition du sujet en notions fondamentales et reformulation claire.

```
S = (n₁, n₂, ..., nₖ) où nᵢ sont les notions clés
∀nᵢ ∈ S, ∃dᵢ : nᵢ → langage_simple
∃N : N ∈ Programme ∧ relevant(N, S)
S' = reformulation(S) en langage naturel
```

## Thèse X — Première position
Construction d'une première réponse argumentée avec exemples, valeurs et références.

```
X = thèse_initiale(S)
∃{r₁, r₂, r₃} : raisons(X) = {r₁, r₂, r₃}
∃e : exemple(e) ∧ illustre(e, X)
∃V⁺ : valeurs_défendues(X) = V⁺
∃V⁻ : valeurs_craintes(X) = V⁻
∃φ : philosophe(φ) ∧ soutient(φ, X)
```

## Antithèse Y — Position opposée
Construction d'une position contradictoire avec ses propres raisons et contre-exemples.

```
Y = ¬X ∨ contraire(X)
∃{c₁, c₂} : contre_exemples(X) = {c₁, c₂}
∃ψ : philosophe(ψ) ∧ soutient(ψ, Y) ∧ ¬soutient(ψ, X)
```

## Structure de la tension
Identification du dilemme : ce qu'on gagne et perd avec chaque position.

```
Coût(X) = {gains(X), pertes(X)}
Coût(Y) = {gains(Y), pertes(Y)}

Tension(S) ≡ (X ∧ ¬Y) ∨ (Y ∧ ¬X)
              ∧ nécessaire(X, N) 
              ∧ nécessaire(Y, N)
              ∧ incompatible(X, Y)
```

## Condition de validité
Vérification que la tension est authentique : pas de solution évidente, vrai dilemme.

```
Tension_valide(S) ≡ 
    ∃e₁ : exemple(e₁, X) 
    ∧ ∃c₁ : contre_exemple(c₁, X)
    ∧ opposition_claire(X, Y)
    ∧ identifiées(V⁺(X), V⁺(Y))
    ∧ ¬∃z : résolution_évidente(z, Tension(S))
    ∧ dilemme_authentique(Coût(X), Coût(Y))
```

---

### Le cœur logique de la tension

```
∀S : Problème_philosophique(S) →
     ∃X, Y, V₁, V₂ : 
       [apparemment_nécessaire(S, X) ∧ 
        apparemment_nécessaire(S, Y) ∧
        (X → ¬accepter(V₂)) ∧ 
        (Y → ¬accepter(V₁)) ∧
        inacceptable(¬V₁) ∧ 
        inacceptable(¬V₂)]
```
